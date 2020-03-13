<?php


$ch=curl_init();
curl_setopt_array($ch,[
    CURLOPT_URL=>"http://localhost/az-yeni-php-dersler/curl/file-form.php",
    CURLOPT_RETURNTRANSFER=>true,
    CURLOPT_POST=>true,
    CURLOPT_POSTFIELDS=>[
        'ad'=>'udemy', 
        'dosya'=>new CURLFile('Untitle2d.jpg','image/jpeg')//'application/zip'  bunu yazmaqla yene onu aldadiram tutaqki
        //diyirki ancaq xanimlar iceri girib yukleye biler ,bununla bir kisiye parik qoyuram oda bunu ede 
        //bilir buda boyuk bir ACIKDIR
    ]
]);

$source=curl_exec($ch);

curl_close($ch);
 
echo $source;
?>