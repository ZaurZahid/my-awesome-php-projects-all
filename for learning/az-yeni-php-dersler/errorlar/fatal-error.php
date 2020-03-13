<?php
error_reporting(E_ALL^E_ERROR);


function olumculHata(){
    $hata=error_get_last();
    if($hata['type']==1){
        echo "Olumcul Hata tapildi:".$hata['type']." tipinde ve problem burda=>".$hata['message']." cixir"; 
    }
;}

register_shutdown_function('olumculHata');
test();
?>