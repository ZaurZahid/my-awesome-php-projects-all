<?php
function yukle($dosya){
     $sonuc=[];
 
    if($dosya['error']==4){
        $sonuc['hata']='lutfen bir sey gonderin';
    }else{ 
        if(is_uploaded_file($dosya['tmp_name'])){ //eger tmp-name yuklenibse
            $uzanti=explode(".",$dosya["name"]);
            $uzanti=$uzanti[1];
          $izinli_dosyalar=[
              'image/jpeg',
              'image/png',
              'image/gif'
          ];
          $yuklenen_dosya=$dosya['type'];
          $yuklenen_dosya_boyutu=(1024*1024);
    
          if(in_array($yuklenen_dosya,$izinli_dosyalar)){ //eger yuklenen_dosya ,,,,,izinli_dosyalarda varsa if-i et
               if($yuklenen_dosya_boyutu>=$dosya['size']){
                   $ad=uniqid();
                      $depo=move_uploaded_file($dosya['tmp_name'],'depo/'.$ad.".".$uzanti);//tmp-name-i ==> depo/don.jpg--ye gonder
                         if($depo){
                             echo 'yeah you did it very nice:)';
                              $sonuc['deyer']='depo/'.$ad.".".$uzanti;      
                        
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
 $x=yukle($_FILES['sekil']);
 if(isset($x['hata'])){
    echo  $x['hata'];
 }else{
     echo "<hr>"; 
     echo '<a href="'. $x['deyer'] . '">sekili gormek ucun tiklayin....</a>';
 
    }
?>