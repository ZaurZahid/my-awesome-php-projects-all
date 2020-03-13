<?php
//giris sistemi zad olacagi ucun sessionu baslatmaliyam
session_start();
ob_start();//yonlendirmeler ucun
//vaxti uygulamaq ucun
date_default_timezone_set('Asia/Baku');
//errorlarin hamsini goster
/*  error_reporting(E_ALL);
ini_set('display_errors',1);  */ 
//automotic classlari yuklemek ucun
function loadClasses($classname){
    require __DIR__."/classes/".strtolower($classname).".php";
} 
spl_autoload_register('loadClasses');



//database ile elaqeni qurmaq ucun
$config=require __DIR__."/config.php";

//try catch ile yoxlayiram
try{
    $db=new basicdb($config['db']['host'],$config['db']['name'],$config['db']['user'],$config['db']['pass']);
}catch(PDOException $e){
    die($e->getMessage());
}
require __DIR__."/settings.php";
//helper papkasindaki butun doyalari listelemek ucun
//helperleyi automotik kullanmaq ucun 
foreach(glob(__DIR__.'/helper/*.php') as $helperFile){
    require $helperFile;
}

?>