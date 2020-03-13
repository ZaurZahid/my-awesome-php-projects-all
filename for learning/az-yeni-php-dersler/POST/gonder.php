<?php

function filtrEle($val){
    return is_array($val) ? array_map('filtrEle',$val): htmlspecialchars(trim($val));
}

$x=array_map('filtrEle',$_POST);
print_r($x) ; 

function post($name){
    if(isset($_POST[$name])){
        return $_POST[$name];
    }
}
echo post("username");

?>