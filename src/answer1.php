<?php

$simple_string = '[
{
"id_pengada": "123321",
"id_cust": "000000990000",
"kode_pengguna": 1,
"jenis_pengguna": 1,
"tgl_registrasi": "2021/01/11",
"nama_pengguna": "Ari",
"no_ktp": "0000000000000088",
"no_npwp": "000000000000022"
}
]';
echo "<br>";
// Display the original string
echo "Original String: " . $simple_string;
echo "<br>";
// Store the cipher method
$ciphering = "AES-256-CBC";
  
// Use OpenSSl Encryption method
$iv_length = openssl_cipher_iv_length($ciphering);
$options = 0;
  
// Non-NULL Initialization Vector for encryption
$encryption_iv = 'ijzh84t1w9xa56s9';
  
// Store the encryption key
$encryption_key = "4bd393e7a457f9023d9ba95fffb5a2e1";
  
// Use openssl_encrypt() function to encrypt the data
$encryption = openssl_encrypt($simple_string, $ciphering,
            $encryption_key, $options, $encryption_iv);

echo "Encrypted String: " . $encryption . "\n";
echo "<br>";

// Non-NULL Initialization Vector for decryption
$decryption_iv = 'ijzh84t1w9xa56s9';
  
// Store the decryption key
$decryption_key = "4bd393e7a457f9023d9ba95fffb5a2e1";
  
// Use openssl_decrypt() function to decrypt the data
$decryption=openssl_decrypt ($encryption, $ciphering, 
        $decryption_key, $options, $decryption_iv);
  
// Display the decrypted string
echo "Decrypted String: " . $decryption;
?>