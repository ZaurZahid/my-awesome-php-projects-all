<?php


$ch=curl_init();
curl_setopt_array($ch,[
    CURLOPT_URL=>"http://localhost/az-yeni-php-dersler/curl/form.php",
    CURLOPT_RETURNTRANSFER=>true,
    CURLOPT_POST=>true,
    CURLOPT_POSTFIELDS=>[
        'ad'=>'Zaur',
        'soyad'=>'Aliyev',
        'meslek'=>'Web Developer',
        'submit'=> 1
    ]
]);

$source=curl_exec($ch);

curl_close($ch);
 
echo $source;
?>