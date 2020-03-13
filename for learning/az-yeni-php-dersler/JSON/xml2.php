<?php
  header("Content-type:text/xml");
/* $xml=new SimpleXMLElement('<zaur/>');
$xml->addChild('ad','Zaur');
$xml->addChild('soyad','Aliyev');
    $siteler=$xml->addChild('siteler');
        $site=$siteler->addChild('site');
            $site->addAttribute('id',5);
            $site->addChild('url','http:zaur.php');
            $site->addChild('baslik','Zaur 1ci test');
        $site=$siteler->addChild('site');
            $site->addAttribute('id',6);
            $site->addChild('url','http:test.php');
            $site->addChild('baslik','Zaur 2 ci test');
    echo $xml->asXML();
 */
$dizi=[
    'ad' => 'Zaur',
    'soyad' => 'Aliyev',
    'siteler'=>[ 
                '0'=> [
                    'url' => 'http:zaur.php',
                    'baslik'=> 'Zaur 1ci test'
                ],
                '1'=> [
                    'url' => 'http:test.php',
                    'baslik'=> 'Zaur 2 ci test'
                ]
                
          ]
  ];
     
    function array_to_Xml($dizi,$xml){
            foreach($dizi as $key=>$val){
                if(is_array($val)){
                    if(is_numeric($key)){
                        $key='site';
                    }
                    array_to_Xml($val,$xml->addChild($key));
                    }else{
                        $xml->addChild($key,$val);
                    }
                 }  
            return $xml->asXML();
        }
   
     
      echo  array_to_Xml($dizi,new SimpleXMLElement('<zaur/>'));
  
?>