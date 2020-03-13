<?php
 
$ch=curl_init();
curl_setopt_array($ch,[
    CURLOPT_URL=>"https://photos.google.com/photo/AF1QipPlO_KeSkAVEOvTjyMf1KQ2dAu8TKPnw9KmE-lZ" ,
    CURLOPT_RETURNTRANSFER=>true,
     
]);

if(curl_exec($ch)==false){

    echo curl_error($ch);
}
curl_close($ch);
 
echo $source;
?>