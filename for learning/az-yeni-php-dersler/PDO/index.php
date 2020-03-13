<?php
ob_start();
require_once 'baglan.php';

//getden gelen deyerleri filter edir sonra verir mene
$_GET=array_map(function($get){
    return htmlspecialchars(trim($get));
},$_GET);

if(!isset($_GET['sayfa'])){
     $_GET['sayfa']='index';
} 
switch ($_GET['sayfa']) {
    case 'insert':
        require_once 'insert.php'; 
        break;
    case 'index':
        require_once 'homepage.php'; 
        break;
    case 'oxu':
        require_once 'oxu.php'; 
        break;
    case 'guncelle':
        require_once 'guncelle.php'; 
        break;
    case 'sil':
        require_once 'sil.php'; 
        break;
    case 'kategoriler':
        require_once 'kategoriler.php'; 
    break;
    case 'kategori':
        require_once 'kategori.php'; 
    break;
   
    default:
        # code...
        break;
}

?>