<?php

    $file=fopen("curl-endirme.txt","w+");

    $ch=curl_init('http://video.az');
    curl_setopt($ch,CURLOPT_FILE,$file);
    curl_exec($ch);
    curl_close($ch);


?>