<?php
  require "baglan.php" ;

$sonuc=[];

if(isset($_POST['tip'])){
    if($_POST['tip']=="iletisim"){
        $ad=$_POST['ad']  ;
        $email=$_POST['email'] ;
        $mesaj=$_POST['mesaj'];

        if(!$ad){
            $sonuc['hata']="adinizi yazmalisiniz";
            $sonuc['target']='ad';
        }elseif(!$email){
            $sonuc['hata']="emailinizi yazmalisiniz";
            $sonuc['target']='email';
        }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $sonuc['hata']="emailinizi duzgun formatta yazmalisiniz";
            $sonuc['target']='email';
        }elseif(!$mesaj){
            $sonuc['hata']="mesaj yazmalisiniz";
            $sonuc['target']='mesaj';
        }else{

            $sorgu=$db->prepare("INSERT INTO iletisim set
            ad=?, 
            email=?,
            mesaj=? 
            ");
            $ekle=$sorgu->execute([
                $ad,$email,$mesaj 
            ]); 
            if($ekle){
                $sonuc['deyer']="her sey super sekilde oldu";
            }else{
                $sonuc['hata']="db ile bagli nese oldu yeni yuklenemedi";
            }
        }

echo json_encode($sonuc);


    }
}


?>