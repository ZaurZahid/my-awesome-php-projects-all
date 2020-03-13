<?php

/* $metn="men php ni sevirem ";
//ancaq php bos soz olsun menasini verir
$sonuc=preg_match('/\bphp\b/',$metn);
if($sonuc){
    echo "yes"; 
}else{
    echo "no"; 
}
 */
/* ============================================================== */


//bir adresden bir sey almaq
/* $metn="men php ni sevirem ";
$sonuc=preg_match('/\bphp\b/',$metn);
 */
  $url="http://www.php.net/index";
preg_match('@^(?:http://)?([^/]+)@i',$url,$sonuc2);
print_r($sonuc2);  



/* ============================================================== */



/*  
$tarix="2019-07-25"; 
$desen="/(?<il>\d{4})-(?<ay>\d{2})-(?<gun>\d{2})/";
preg_match($desen,$tarix,$sonuc);
print_r($sonuc); 

 */

/* ============================================================== */
 
$gmail='zauraliyev1999@gmail.com.az';
$desen='/^(\w+)@([a-z]+)\.([a-z]{2,})(.[a-z]{2}|)$/'; //  \.bu noqteden evvel qoyuramki casmasin eslinde noqtedir 
 $sonuc=preg_match($desen,$gmail);
/* if($sonuc){
    echo "yes"; 
}else{
    echo "no"; 
}   */
preg_match($desen,$gmail ,$sonuc);
print_r($sonuc); 
 //bele yazilir
/* Array
(
    [0] => zauraliyev1999@gmail.com.az
    [1] => zauraliyev1999
    [2] => gmail
    [3] => com
    [4] => .az
) */

/* ============================================================== */
?>