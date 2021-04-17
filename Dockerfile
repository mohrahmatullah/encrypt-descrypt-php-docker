FROM php:7.2.28-apache
COPY src/ /var/www/html/
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
RUN cd /usr/local/etc/php/conf.d/ && \
    echo 'memory_limit = -1' >> /usr/local/etc/php/conf.d/docker-php-memlimit.ini && \
    echo 'max_execution_time = 300' >> /usr/local/etc/php/conf.d/docker-php-maxexectime.ini;
RUN chmod -R 755 /var/www/html/
RUN chgrp -R www-data /var/www/html/
RUN chown -R www-data:www-data /var/www/html/
RUN a2enmod rewrite
RUN docker-php-ext-install pdo pdo_mysql mysqli gettext session bcmath calendar exif pcntl shmop sockets sysvmsg sysvsem sysvshm 
RUN sed -i 's/extension=gmp.$/extension=gmp/;s/extension=curl.$/extension=curl/;$/extension=php_mcrypt.dll/;' /etc/php7/php.ini 
EXPOSE 80
