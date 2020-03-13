<?php
require 'db.php';
$id=1;
$hakkinda=$_POST['hakkinda'];

$sor=$db->prepare("UPDATE uyeler set hakkinda=? where id=?");
$sor->execute([
   $hakkinda , $id
]);
 
 
header("location:index.php");
?>