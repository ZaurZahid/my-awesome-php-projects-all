<?php 
/* $ch=curl_init();
curl_setopt_array($ch,[
    CURLOPT_URL=>"http://localhost/az-yeni-php-dersler/curl/abc.php",
    CURLOPT_RETURNTRANSFER=>true,
    CURLOPT_HTTPHEADER=>[
        "Token:zaur1999"
        ]

]);

$source=curl_exec($ch);

curl_close($ch);
 
echo $source; */

$ch=curl_init();
curl_setopt_array($ch,[
    CURLOPT_URL=>"http://localhost/az-yeni-php-dersler/curl/abc.php",
    CURLOPT_RETURNTRANSFER=>true,
    CURLOPT_HEADER=>true 
    //eger ancaq istiyiremse ancaq HEAERDE olanlar gelsin bele yaza bilerem
   // CURLOPT_NOBODY=>true

]);

$source=curl_exec($ch);

curl_close($ch);
 
echo $source;
?>