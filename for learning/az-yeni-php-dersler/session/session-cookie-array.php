<?php
session_start();
ob_start();

/* $_SESSION['kul']=[
    'ad'=>"zaur",
    'yas'=>20
];
 print_r($_SESSION); */
setcookie("kul['ad]","zaur",time() + 5);
setcookie("kul['soyad]","Aliyev",time() + 7);
print_r($_COOKIE);
?>