<?php
/* //basla
$ch=curl_init();

//optionlar qoy

curl_setopt_array($ch,[
    CURLOPT_URL=>"http://localhost/az-yeni-php-dersler/curl/test.php",
    CURLOPT_RETURNTRANSFER=>true,
    CURLOPT_REFERER=>"https://google.com"
]);

//icra ele
$source=curl_exec($ch);

//sonlandir
curl_close($ch);
 
echo $source;

 */

/* ============================================================================== */


$ch=curl_init();
curl_setopt_array($ch,[
    CURLOPT_URL=>"http://video.az/",
    CURLOPT_RETURNTRANSFER=>true,
    CURLOPT_USERAGENT=>$_SERVER['HTTP_USER_AGENT'] 
]);

$source=curl_exec($ch);

curl_close($ch);
 
echo $source;
?>