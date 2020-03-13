<?php

define('PATH',realpath('.'));   
define('URL','http://localhost/abcde'); 
foreach(glob(__DIR__.'/helper/*.php') as $helperFile){
    require $helperFile;
}

?>