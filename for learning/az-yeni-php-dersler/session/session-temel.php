<?php 

session_start();

 $_SESSION['kullanici_adi']='zaur';
echo $_SESSION['kullanici_adi'];


 session_destroy();


?>