<?php

$ch=curl_init('http://adasdasda.az');
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
if(curl_exec($ch)==false){

    echo curl_error($ch);
}
 
curl_close($ch);


?>