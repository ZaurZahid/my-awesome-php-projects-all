<?php 

if(!isset($_GET['id']) || empty($_GET['id'])){
    header("location:index.php");
    exit;
}
$sor=$db->prepare("DELETE  FROM dersler where id=?");
$sor->execute([
    $_GET['id']
]);
header("location:index.php");
?>