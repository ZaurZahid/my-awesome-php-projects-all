<?php
require __DIR__."/app/init(bostrap).php";

$routeExplode=explode('?',$_SERVER['REQUEST_URI']);
$route=array_values(array_filter(explode('/' , $routeExplode[0])));
if(SUBFOLDER){
    array_shift($route);//1 cisini silir
}
if(!route(0)){
    $route[0]='index';//ilk sehifeni index ele
}
if(!file_exists(controller(route(0)))){
    $route[0]='404';//eger yazdigim sehife olmazsa 404 e gonder
}

//bakim modu acikmi?
if(setting('maintenance_mode')==1 && route(0) != 'admin'){
    $route[0]='maintenance-mode';
}

//butun etaplari kecenden sonra cagira bilerem
require controller(route(0)); 
?>