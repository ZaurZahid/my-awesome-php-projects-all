<?php
require __DIR__."/app/init.php";
  
$routeExplode=explode('?',$_SERVER['REQUEST_URI']);
$route=array_values(array_filter(explode('/' , $routeExplode[0])));
if(SUBFOLDER){
    array_shift($route);//1 cisini silir
}
if(!route(0)){
    $route[0]='index';//ilk sehifeni index ele
}
require view(route(0)); 
?>