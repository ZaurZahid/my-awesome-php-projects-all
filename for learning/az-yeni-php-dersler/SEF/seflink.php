<?php

function seflink($str){
    //turkce xarakterler ile balacalasdir
 $str=mb_strtolower($str,'UTF-8');
 //turkce xxarekterleri deyis
 $str=str_replace(
     ['ç','ş','ı','ə','ö','ğ','ü'],
     ['c','s','i','e','o','g','u'],
     $str
 );
 //normal sayilar ve herfler xaric herseyi tire isaresi ile dondur
 $str=preg_replace('/[^a-z0-9]/','-',$str);
//birden cox tireni bir tire kimi yaz
 $str=preg_replace('/-+/','-',$str);
 //evvelden ve sondan tireleri kes
 return trim($str,'-');
}

$str="_-Bu menİm üçün çox xoşdur.2019?????????@#@$#$%&-";
echo seflink($str);
?>