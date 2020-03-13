<?php
//dizini jsona cerirmek ucun
/* $x=[
    "ad"=> "Zaur",
    "soyad"=> "Aliyev",
    "siteler"=> [
    [ 
        "url"=> "http=>zaur.php",
        "baslik"=> "Zaur 1ci test"
    ],
    [
        "url"=> "http=>test.php",
        "baslik"=> "Zaur 2 ci test"
    ]
   ]

        ];
        echo json_encode($x);

 */
/* $json='{
    "ad": "Zaur",
    "soyad": "Aliyev",
    "siteler": [{
            "url": "http:zaur.php",
            "baslik": "Zaur 1ci test"
        },
        {
            "url": "http:test.php",
            "baslik": "Zaur 2 ci test"
        }
    ]

}'; */
$json=file_get_contents("test.json");
$arr = json_decode($json,true);
print_r($arr); 
?>