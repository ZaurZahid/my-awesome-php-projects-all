<?php 
session_start();
require "ayarlar.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SESSION Document</title>
</head>
<body>

<?php
if(isset($_SESSION["kul_ad"])){
    require "admin.php";
}else{
    require "giris.php";
}

?>
   
</body>
</html>