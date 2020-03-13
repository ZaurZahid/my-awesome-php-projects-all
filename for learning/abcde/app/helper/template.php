<?php

 
function view($viewName){
    $viewName=strtolower($viewName);
    return PATH.'/app/view/'.$viewName.'.php';
}

function public_url($url=false){
    return URL . '/public/' . $url;
}
 

function route($index){
    global $route ;
    return isset($route[$index]) ? $route[$index] : false;
}
 
?>