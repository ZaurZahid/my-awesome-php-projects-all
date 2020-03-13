<?php
 if(!$_SERVER['HTTP_USER_AGENT']){
    die("botlara giris olmaz");
}

print_r($_SERVER['HTTP_USER_AGENT']);

?>