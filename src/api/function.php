<?php

class func {

    public function __construct($reason){
        switch ($reason) {
            case 'encrypt':
                $this->encrypt();
                break;
            case 'decrypt':
                $this->decrypt();
                break;
            default:
                # code...
                break;
        }
    }

    private function encrypt() {
        $data= $_POST['data'];

        $simple_string = $data['text'];
        // Store the cipher method
        $ciphering = "AES-128-CTR";
          
        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
          
        // Non-NULL Initialization Vector for encryption
        $encryption_iv = $data['iv'];
          
        // Store the encryption key
        $encryption_key = $data['key'];
          
        // Use openssl_encrypt() function to encrypt the data
        $encryption = openssl_encrypt($simple_string, $ciphering,
                    $encryption_key, $options, $encryption_iv);

        echo $encryption;
    }

    private function decrypt() {
        $data= $_POST['data'];

        $encryption = $data['text'];
        // Store the cipher method
        $ciphering = "AES-128-CTR";
          
        // Use OpenSSl Encryption method
        $iv_length = openssl_cipher_iv_length($ciphering);
        $options = 0;
          
        // Non-NULL Initialization Vector for encryption
        $decryption_iv = $data['iv'];
          
        // Store the encryption key
        $decryption_key = $data['key'];
          
        // Use openssl_encrypt() function to encrypt the data
        $decryption=openssl_decrypt ($encryption, $ciphering, 
        $decryption_key, $options, $decryption_iv);

        echo $decryption;
    }

}

new func($_POST['reason']);
