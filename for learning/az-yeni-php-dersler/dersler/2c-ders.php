<?php

$arr=[
    'a'=>'zaur',
    'x'=>'asdas',
    'b'=>[
        'c'=>'d',
        'e'=>'f'
    ]
    ];

function _array_keys($arr){
          static $keys=[]; 
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
?>