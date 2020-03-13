<?php

$ch=curl_init();
curl_setopt_array($ch,[
    CURLOPT_URL=>"http://localhost/az-yeni-php-dersler/curl/login-example/index.php",
    CURLOPT_RETURNTRANSFER=>true,
    CURLOPT_POST=>true,
    CURLOPT_POSTFIELDS=>[
        'ad'=>'admin',
        'sifre'=>"admin",
        "submit"=>1
    ],
    CURLOPT_COOKIEJAR=>dirname(__FILE__)."\\cookie.txt",
    CURLOPT_COOKIEFILE=>dirname(__FILE__)."\\cookie.txt"
]);

$source=curl_exec($ch);

curl_close($ch);
 


$ch=curl_init();
curl_setopt_array($ch,[
    CURLOPT_URL=>"http://localhost/az-yeni-php-dersler/curl/login-example/index.php",
    CURLOPT_RETURNTRANSFER=>true,
    CURLOPT_POST=>true,
    CURLOPT_POSTFIELDS=>[
        'hakkinda'=>'curl isleyir' 
    ], 
    CURLOPT_COOKIEFILE=>dirname(__FILE__)."\\cookie.txt"
]);

$source2=curl_exec($ch);

curl_close($ch);

echo $source2;
?>