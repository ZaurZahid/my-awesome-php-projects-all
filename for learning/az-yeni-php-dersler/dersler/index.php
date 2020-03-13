<?php

/* $kategoriya=[
    'siteler'=>[
            'e-ticaret'=>[
                    'sahib',
                    'n110',
                    'sa',
                    'saaas'
                        ],
            'egitim'=>[
                    'udemy',
                    'php',
                    'javascript'
                       ]
               ]
          ];
   
   print_r($kategoriya);
 
 echo $kategoriya['siteler']['egitim'][0]." , ".$kategoriya['siteler']['egitim'][1];



define( ABC ,[
    'ad'=>'zaur', 
     'egitim'=>[
                'udemy',
                'php',
                'javascript'
                   ]
         
]);
echo ABC['ad'];
 */
/* $a=1;
for($i=0;$i<=10;$i++){
echo $i." ustune bir gel olur =>".$i=$i+1 ."<br>";
} */
/* $i=11;
while($i<=10){ 
    echo $i .'<br>';
    $i++;
} *//* 
$kategoriya=[
    'siteler'=>[
            'e-ticaret'=>[
                    'sahib',
                    'n110',
                    'sa',
                    'saaas'
                        ],
            'egitim'=>[
                    'udemy',
                    'php',
                    'javascript'
                       ]
               ]
          ];
  $qazan= function($a,$b) {
     global $kategoriya; 
         if($kategoriya['siteler']['e-ticaret'][0]==="sahib"){  
             return "beli siz oyunun qalibisiz"." ve=> ".($a+$b)."manat pul qazandiz"; 
          } else {
                        echo "siz uduzduz"; 
                }
             };

             $x=function() use($qazan){
             return " zaur mellim ".$qazan(1000,5020);
                };
 
            echo $x() ;
      */
/*       $arr=[ 
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
 */

$arr=[
    'a'=>'zaur',
    'b'=>[
        'c'=>'d',
        'e'=>'f'
    ]
    ];
//$test=array_search('zaur',$arr);
/* function incele($cur_val,$arr){
    foreach($arr as $key=>$val){
           if($val==$cur_val){
               return $key;
            }
           
           if(is_array($val)){
                return incele($cur_val,$val);
            }
          }
          return false;
}
$test=incele('f',$arr);
echo $test; */

/* $arr=[
    'a'=>'zaur',
    'x'=>'asdas',
    'b'=>[
        'c'=>'d',
        'e'=>'f'
    ]
    ];

function _array_keys($arr){
          static  $keys=[]; 
            foreach($arr as $key=>$val){   
                array_push($keys,$key);
                if(is_array($val)){
                     _array_keys($val);
                }
            }
            return $keys;
}


$x=_array_keys($arr);
print_r($x);

 */


 for ($i=0; $i <=10 ; $i++) { 
   $repeatNums= ($i<=5 ? $i : (10-$i));
      
     echo str_repeat("*",$repeatNums)."<br>";
 }



?>