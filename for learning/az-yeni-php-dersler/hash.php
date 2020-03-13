<?php


$sifre="zaur1999";
$x=password_hash($sifre,PASSWORD_DEFAULT);

if(password_verify($sifre,$x)){
    echo $x;
}

?>