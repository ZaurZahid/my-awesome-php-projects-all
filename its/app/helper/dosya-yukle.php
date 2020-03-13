<?php
function yukle($dosya){
    $sonuc=[];

   if($dosya['error']==4){
       $sonuc['hata']='lutfen bir sey gonderin';
   }else{ 
       if(is_uploaded_file($dosya['tmp_name'])){ //eger tmp-name yuklenibse
         $uzanti=explode(".",$dosya["name"]);
         $esas_uzanti=$uzanti[1];
         $izinli_dosyalar=[
             'image/jpeg',
             'image/png',
             'image/gif'
         ];
         $yuklenen_dosya=$dosya['type'];
         $yuklenen_dosya_boyutu=(1024*1024);
   
         if(in_array($yuklenen_dosya,$izinli_dosyalar)){ //eger yuklenen_dosya ,,,,,izinli_dosyalarda varsa if-i et
              if($yuklenen_dosya_boyutu>=$dosya['size']){
                  $ad=$uzanti[0];
                     $depo=move_uploaded_file($dosya['tmp_name'],PATH.'/app/public/img/img/'.$ad.".".$esas_uzanti);//tmp-name-i ==> depo/don.jpg--ye gonder
                        if($depo){
                              $sonuc['deyer']=$ad.".".$esas_uzanti;       
                           }else{
                           $sonuc['hata']="there is a problem";
   
                        }
              }else{
                  $sonuc['hata']="boyut ancaq 1 MB-a qeder ola biler....";
              }
         }else{
             $sonuc['hata']="ancaq jpg,png ve gif gondere bilersiz....";
         } 
       }else{
           $sonuc['hata']="dosya yuklenende nese bir problem oldu";
       }
   }
   return $sonuc;
}

?>