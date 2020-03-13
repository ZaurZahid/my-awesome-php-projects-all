<?php

function autoLoadController($className){
    $classFile=__DIR__ ."/controller/" .strtolower($className) .".php";
    if(file_exists($classFile))
    require $classFile;
}
function autoLoadHelper($className){
    $classFile=__DIR__ ."/helper/" .strtolower($className) .".php";
    if(file_exists($classFile))
    require $classFile;
}
function autoLoadClass($className){
 
    $className = strtolower(str_replace('\\' , '/' , $className)) . ".php";
    require $className;
}
//spl_autoload_register('autoLoadController');
spl_autoload_register('autoLoadClass');


$home=new  Controller\Home;
 //echo $home->test();
 
$helper=new Helper\Test;




?>