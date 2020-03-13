<?php
$file=fopen("kaynak.txt","w");

$ch=curl_init();

curl_setopt($ch,CURLOPT_URL,'https://www.neyazilim.com');
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
//curl_setopt($ch,CURLOPT_FILE,$file);

/*  
if(curl_exec($ch)){
    echo "basarili";
} */
curl_close($ch);



?>
<a href="https://www.neyazilim.com">get</a>