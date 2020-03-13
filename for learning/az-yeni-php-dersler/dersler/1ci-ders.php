<?php 

$arr=[ 
    'ad'=>"ZAUR",
    'soyad'=>'Aliyev',
    'sporlar'=>[
         'uzme'=>"he",
         'basqa_sporlar'=>[
              'judo'=>"he",
              "karate"=>"ejdahasiyam:)"
                ]       
           ]
        ]; 

function dizidebul($m,$anahtar){
foreach($m as $key =>$val){
      if($key==$anahtar){
          return $val;
      }
      if(is_array($val)){
          $sonuc=dizidebul($val,$anahtar);
      }
      if($sonuc){
          return $sonuc;
      }
}
return false;
}
 echo dizidebul($arr,'uzme');
?>