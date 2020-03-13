<?php
if(!$_SERVER['HTTP_REFERER']){
    die("botlara giris olmaz");
}

print_r($_SERVER);

?>