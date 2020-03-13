<?php
require 'header.php';
if(!isset($_GET['id']) || empty($_GET['id'])){
     header("location:index.php");
     exit;
}
$sorgu=$db->prepare("SELECT * FROM dersler where id=? && onay=1");
$sorgu->execute([
    $_GET['id']
]);
$islet=$sorgu->fetch(PDO::FETCH_ASSOC);
if(!$islet){
    header("location:index.php");
    exit;
}
?>
  <strong><?php echo $islet['icerik']?></strong> 