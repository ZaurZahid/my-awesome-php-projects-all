<?php
 
function yukle($dosyalar){
    //hatalari kontrol et
    $sonuc=[];

    foreach($dosyalar['error'] as $index =>$error){
        if($error==4){
            $sonuc['hata']='lutfen bir sey gonderin';
        }elseif($error!=0){
            $sonuc['hata'][]='bu dosyalarda problem oldu=>'.$dosyalar['name'][$index];
        }
    }
//hata yoksa devam et 
if(!isset($sonuc['hata'])){
//dosya uzantilarini kontrol et
    $izinli_dosyalar=[
        'image/jpeg',
        'image/png',
        'image/gif'
    ];

    foreach($dosyalar['type'] as $index =>$type){


      if(!in_array($type,$izinli_dosyalar)){ //eger yuklenen_dosya ,,,,,izinli_dosyalarda varsa if-i et
         
            $sonuc['hata'][]="dosya formata uygun gelmir=>".$dosyalar['type'][$index];
                
                } 
            }
        }

//boyutu kontrol et
        if(!isset($sonuc['hata'])){
            $yuklenen_dosya_boyutu=(1024*1024); 
        
        foreach($dosyalar['size'] as $index =>$size){
            if($yuklenen_dosya_boyutu<=$dosya['size']){
                    $sonuc['hata'][]="boyut ancaq 1 MB-a qeder ola biler....".$dosyalar['name'];
               }
        }
    }
//dosyalari yukle
    if(!isset($sonuc['hata'])){
        foreach($dosyalar['tmp_name'] as $index =>$tmp_name){
            $dosya_adi=$dosyalar['name'][$index];
            $depo=move_uploaded_file($tmp_name,'depo/'.$dosya_adi);
            if($depo){
                
                $sonuc['deyer'][]='depo/'.$dosya_adi;  
                echo 'yeah you did it very nice:) for=>'.$dosya_adi; echo'<br>';
            }else{
                 $sonuc['hata'][]="there is a problem on".$dosya_adi;
                 }
            }
        }

    return $sonuc;   
}
 $x=yukle($_FILES['sekil']);
        
        if(isset($x['deyer'])){
            //print_r($x['deyer']);
            echo "<hr>"; 
            foreach($x['deyer'] as $m){
                 echo '<a href="'.$m. '">"'.$m. '"adli sekili gormek ucun tiklayin....</a>';echo "<hr>"; 
            }           
                    if(isset($x['hata'])){
                        echo $x['hata'];
                    }
                }
                
                elseif(isset($x['hata'])){
                    if(is_array($x['hata'])){
                            echo implode("<br>",$x['hata']);
                    }else{
                            echo $x['hata'];
                            }
                    }
        
 

?>