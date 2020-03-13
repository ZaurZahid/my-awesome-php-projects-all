<?php

ob_start();
session_start();
date_default_timezone_set('Asia/Baku');

include 'baglan.php';  
include '../production/fonksiyon.php';  

if (isset($_POST['musterikaydet'])) {

	
    $kullanici_ad=htmlspecialchars($_POST['kullanici_ad']); echo "<br>";
    $kullanici_soyad=htmlspecialchars($_POST['kullanici_soyad']); echo "<br>";
    $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); echo "<br>";

    $kullanici_passwordone=htmlspecialchars(trim($_POST['kullanici_passwordone'])); echo "<br>";
    $kullanici_passwordtwo=htmlspecialchars(trim($_POST['kullanici_passwordtwo'])); echo "<br>";

  

  if ($kullanici_passwordone==$kullanici_passwordtwo) {


      if (strlen($kullanici_passwordone)>=6) {

// Başlangıç

          $kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_mail=:mail");
          $kullanicisor->execute(array(
              'mail' => $kullanici_mail
              ));

          //dönen satır sayısını belirtir
          $say=$kullanicisor->rowCount();



          if ($say==0) {

              //md5 fonksiyonu şifreyi md5 şifreli hale getirir.
              $password=md5($kullanici_passwordone);

              $kullanici_yetki=1;

           
          //Kullanıcı kayıt işlemi yapılıyor...
              $kullanicikaydet=$db->prepare("INSERT INTO kullanici SET
                  kullanici_ad=:kullanici_ad,
                  kullanici_soyad=:kullanici_soyad,
                  kullanici_mail=:kullanici_mail,
                  kullanici_password=:kullanici_password,
                  kullanici_yetki=:kullanici_yetki
                  ");
              $insert=$kullanicikaydet->execute(array(
                  'kullanici_ad' => $kullanici_ad,               
                  'kullanici_soyad' => $kullanici_soyad,
                  'kullanici_mail' => $kullanici_mail,
                  'kullanici_password' => $password,
                  'kullanici_yetki' => $kullanici_yetki
                  ));

               
              if ($insert) {
 
                  header("Location:../../login.php?durum=loginbasarili");

exit;
              //Header("Location:../production/genel-ayarlar.php?durum=ok");

              } else {


                  header("Location:../../register?durum=basarisiz");
              }

          } else {

              header("Location:../../register?durum=mukerrerkayit");



          }




      // Bitiş



      } else {


          header("Location:../../register.php?durum=eksiksifre");


      }



  } else {



      header("Location:../../register.php?durum=farklisifre");
  }
  


}

if (isset($_POST['kullanicigiris'])) {


	
	echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); 
	echo $kullanici_password=md5($_POST['kullanici_password']); 



	$kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_password=:password and kullanici_durum=:durum");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'yetki' => 1,
		'password' => $kullanici_password,
		'durum' => 1
		));


	$say=$kullanicisor->rowCount();



	if ($say==1) {
        $kullanici_sonip= $_SERVER['REMOTE_ADDR'];
        $sonzamanguncelle=$db->prepare("UPDATE kullanici SET
        kullanici_sonzaman=:kullanici_sonzaman, 
        kullanici_sonip=:kullanici_sonip 

        WHERE kullanici_mail= '$kullanici_mail'");
    
    $update=$sonzamanguncelle->execute(array(
        'kullanici_sonzaman' => date("Y-m-d H:i:s"),
       //1 dendemeyi oz kompumuz ile girdiyimize goredir
        'kullanici_sonip' => $kullanici_sonip
 
        ));

        


		$_SESSION['userkullanici_mail']=$kullanici_mail;

		header("Location:../../");
		exit;
		




	} else {


		header("Location:../../login?durum=basarisizgiris");
		exit;

	}


}

if(isset($_POST['musteribilgiguncelle'])){
    

	$ayarkaydet=$db->prepare("UPDATE kullanici SET
    kullanici_ad=:kullanici_ad,
    kullanici_soyad=:kullanici_soyad,
    kullanici_gsm=:kullanici_gsm
    WHERE kullanici_id= {$_SESSION['userkullanici_id']}");

$update=$ayarkaydet->execute(array(
    'kullanici_ad' => $_POST['kullanici_ad'],
    'kullanici_soyad' => $_POST['kullanici_soyad'],
    'kullanici_gsm' => $_POST['kullanici_gsm']
    ));


if ($update) {

    Header("Location:../../hesabim?durum=ok");

} else {

    Header("Location:../../hesabim?durum=no");
}

}

if (isset($_POST['musteriadresguncelle'])) {
 
    $kullaniciguncelle=$db->prepare("UPDATE kullanici SET

        kullanici_tip=:kullanici_tip,
        kullanici_tc=:kullanici_tc,
        kullanici_unvan=:kullanici_unvan,
        kullanici_vdaire=:kullanici_vdaire,
        kullanici_vno=:kullanici_vno,
        kullanici_adres=:kullanici_adres,
        kullanici_il=:kullanici_il,
        kullanici_ilce=:kullanici_ilce
        WHERE kullanici_id={$_SESSION['userkullanici_id']} ");

         $update=$kullaniciguncelle->execute(array(

        'kullanici_tip'=>htmlspecialchars($_POST['kullanici_tip']),
        'kullanici_tc'=>htmlspecialchars($_POST['kullanici_tc']),
        'kullanici_unvan'=>htmlspecialchars($_POST['kullanici_unvan']),
        'kullanici_vdaire'=>htmlspecialchars($_POST['kullanici_vdaire']),
        'kullanici_vno'=>htmlspecialchars($_POST['kullanici_vno']),
        'kullanici_adres'=>htmlspecialchars($_POST['kullanici_adres']),				
        'kullanici_il'=>htmlspecialchars($_POST['kullanici_il']),
        'kullanici_ilce'=>htmlspecialchars($_POST['kullanici_ilce'])
     ));
    if ($update) {
    Header("Location:../../adres-bilgileri.php?durum=ok");

    } else {
    Header("Location:../../adres-bilgileri.php?durum=hata");
    }
 
}


if(isset($_POST['musterisifreguncelle'])){
	
	echo $kullanici_eskipassword=trim($_POST['kullanici_eskipassword']); echo "<br>";
	echo $kullanici_passwordone=trim($_POST['kullanici_passwordone']); echo "<br>";
	echo $kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']); echo "<br>";

	$kullanici_password=md5($kullanici_eskipassword);


	$kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_password=:password");
	$kullanicisor->execute(array(
		'password' => $kullanici_password
		));

			//dönen satır sayısını belirtir
	$say=$kullanicisor->rowCount();



	if ($say==0) {

		header("Location:../../sifre-guncelle?durum=eskisifrehata");



	} else {



	//eski şifre doğruysa başla


		if ($kullanici_passwordone==$kullanici_passwordtwo) {


			if (strlen($kullanici_passwordone)>=6) {


				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password=md5($kullanici_passwordone);

				$kullanici_yetki=1;

				$kullanicikaydet=$db->prepare("UPDATE kullanici SET
					kullanici_password=:kullanici_password,
                    kullanici_yetki=:kullanici_yetki
					WHERE kullanici_id={$_SESSION['userkullanici_id']}");

				
				$insert=$kullanicikaydet->execute(array(
                    'kullanici_password' => $password,
                    'kullanici_yetki' => 1

					));

				if ($insert) {


					header("Location:../../sifre-guncelle.php?durum=sifredegistiOk");


				//Header("Location:../production/genel-ayarlar.php?durum=ok");

				} else {


					header("Location:../../sifre-guncelle.php?durum=no");
				}





	    	// Bitiş



			} else {


				header("Location:../../sifre-guncelle.php?durum=eksiksifre");


			}



		} else {

			header("Location:../../sifre-guncelle?durum=sifreleruyusmuyor");

			exit;


		}


	} 

}

if (isset($_POST['musterimagazabasvuru'])) {
	
    $kullaniciguncelle=$db->prepare("UPDATE kullanici SET

        kullanici_ad=:kullanici_ad,
        kullanici_soyad=:kullanici_soyad,
        kullanici_gsm=:kullanici_gsm,
        kullanici_banka=:kullanici_banka,
        kullanici_iban=:kullanici_iban,
        kullanici_tip=:kullanici_tip,
        kullanici_tc=:kullanici_tc,
        kullanici_unvan=:kullanici_unvan,
        kullanici_vdaire=:kullanici_vdaire,
        kullanici_vno=:kullanici_vno,
        kullanici_adres=:kullanici_adres,
        kullanici_il=:kullanici_il,
        kullanici_ilce=:kullanici_ilce,
        kullanici_magaza=:kullanici_magaza
        WHERE kullanici_id={$_SESSION['userkullanici_id']} ");

         $update=$kullaniciguncelle->execute(array(
         'kullanici_ad'=>htmlspecialchars($_POST['kullanici_ad']),
          'kullanici_soyad'=>htmlspecialchars($_POST['kullanici_soyad']),
         'kullanici_gsm'=>htmlspecialchars($_POST['kullanici_gsm']),
         'kullanici_banka'=>htmlspecialchars($_POST['kullanici_banka']),
         'kullanici_iban'=>htmlspecialchars($_POST['kullanici_iban']),
         'kullanici_tip'=>htmlspecialchars($_POST['kullanici_tip']),
         'kullanici_tc'=>htmlspecialchars($_POST['kullanici_tc']),
         'kullanici_unvan'=>htmlspecialchars($_POST['kullanici_unvan']),
         'kullanici_vdaire'=>htmlspecialchars($_POST['kullanici_vdaire']),
         'kullanici_vno'=>htmlspecialchars($_POST['kullanici_vno']),
         'kullanici_adres'=>htmlspecialchars($_POST['kullanici_adres']),				
         'kullanici_il'=>htmlspecialchars($_POST['kullanici_il']),
         'kullanici_ilce'=>htmlspecialchars($_POST['kullanici_ilce']),
         'kullanici_magaza'=> 1
         
     ));
    if ($update) {
    Header("Location:../../magaza-basvuru?durum=ok");

    } else {
    Header("Location:../../magaza-basvuru?durum=hata");
    }
 
}
	   
if(isset($_POST['sipariskaydet'])){

    $kaydet=$db->prepare("INSERT INTO siparis set
    
    kullanici_id=:id,
    kullanici_idsatici=:idsatici
    
    ");
    $insert=$kaydet->execute(array(
    
    'id'=>htmlspecialchars($_SESSION['userkullanici_id']),
    'idsatici'=>htmlspecialchars($_POST['kullanici_idsatici'])
    
    ));
    if ($insert) {
        $siparis_id=$db->lastInsertId();
    
        $sipariskaydet=$db->prepare("INSERT INTO siparis_detay set
        siparis_id=:siparis_id,
        kullanici_id=:id,
        urun_fiyat=:urun_fiyat,
        urun_id=:urun_id,
        kullanici_idsatici=:idsatici
        
        ");
        $insertsiparis=$sipariskaydet->execute(array(
        'siparis_id'=>$siparis_id,
        'id'=>htmlspecialchars($_SESSION['userkullanici_id']),
        'urun_fiyat'=>htmlspecialchars($_POST['urun_fiyat']),	
        'urun_id'=>htmlspecialchars($_POST['urun_id']),
        'idsatici'=>htmlspecialchars($_POST['kullanici_idsatici'])
         
        ));
    
    if ($insertsiparis) {
        header("location:../../siparislerim.php");
    }
    
    
    
    }
    else {
        header("location:404.php");
    }
    
       }
    
    

    if ($_GET['urunonay']=="ok") {
    $siparis_id=$_GET['siparis_id'];
     $siparis_detayguncelle=$db->prepare("UPDATE siparis_detay SET
     siparisdetay_onay=:siparisdetay_onay 
     WHERE siparisdetay_id={$_GET['siparisdetay_id']} ");
 
 
     $update=$siparis_detayguncelle->execute(array(
    'siparisdetay_onay' => 1
         
         
     ));
     if ($update) {
     Header("Location:../../siparis-detay.php?siparis_id=$siparis_id");
 
     } else {
       Header("Location:../../siparis-detay.php?durum=no");
     }
 
 }
 if ($_GET['urunteslimet']=="ok") {
 $siparis_id=$_GET['siparis_id'];
 $siparis_detayguncelle=$db->prepare("UPDATE siparis_detay SET
 siparisdetay_onay=:siparisdetay_onay 
 WHERE siparisdetay_id={$_GET['siparisdetay_id']} ");


 $update=$siparis_detayguncelle->execute(array(
'siparisdetay_onay' => 2
	 
	 
 ));
 if ($update) {
 Header("Location:../../tamamlanmis-siparisler.php?siparis_id=$siparis_id&ok");

 } else {
   Header("Location:../../yeni-siparisler.php?durum=no");
 }

}
 


if(isset($_POST['puanyorumekle'])){
	
	
	$kaydet=$db->prepare("INSERT INTO yorumlar set
	
	yorum_puan=:yorum_puan,
	yorum_detay=:yorum_detay,
	urun_id=:urun_id,	
	kullanici_id=:kullanici_id

	
	");
	$insert=$kaydet->execute(array(
	
	'yorum_puan'=>htmlspecialchars($_POST['yorum_puan']),
	'yorum_detay'=>htmlspecialchars($_POST['yorum_detay']),
	'urun_id'=>htmlspecialchars($_POST['urun_id']),
	'kullanici_id'=>htmlspecialchars($_SESSION['userkullanici_id'])
	
	
	
	));

	$siparis_id=$_POST['siparis_id'];
	if ($insert) {

		 
		$siparis_detayguncelle=$db->prepare("UPDATE siparis_detay SET
		siparisdetay_yorum=:siparisdetay_yorum 
		WHERE siparis_id=$siparis_id ");
	   
	   
		$update=$siparis_detayguncelle->execute(array(
	   'siparisdetay_yorum' => 1
			
			
		));

		Header("Location:../../siparis-detay.php?siparis_id=$siparis_id");
	   
		} else {
		  Header("Location:../../siparis-detay.php?durum=no");
		}
	}

if(isset($_POST['mesajgonder'])){
		
		$kaydet=$db->prepare("INSERT INTO mesaj set
		
		mesaj_detay=:mesaj_detay,
		kullanici_gelen=:kullanici_gelen,
		kullanici_gonderen=:kullanici_gonderen 
	
		
		");
		$insert=$kaydet->execute(array(
		
		'mesaj_detay'=> $_POST['mesaj_detay'] ,
		'kullanici_gelen'=>htmlspecialchars($_POST['kullanici_gelen']),
		'kullanici_gonderen'=>htmlspecialchars($_SESSION['userkullanici_id']) 
		));

		if ($insert) {

		$kullanici_gelen=$_POST['kullanici_gelen'];

        Header("Location:../../mesaj-gonder.php?durum=ok&kullanici_gelen=$kullanici_gelen");
    
        } else {
        Header("Location:../../mesaj-gonder.php?durum=hata");
        }
  }

  
  if(isset($_POST['mesajcavabver'])){
			
    $kaydet=$db->prepare("INSERT INTO mesaj set
    
    mesaj_detay=:mesaj_detay,
    kullanici_gelen=:kullanici_gelen,
    kullanici_gonderen=:kullanici_gonderen 

    
    ");
    $insert=$kaydet->execute(array(
    
    'mesaj_detay'=> $_POST['mesaj_detay'] ,
    'kullanici_gelen'=>htmlspecialchars($_POST['kullanici_gelen']),
    'kullanici_gonderen'=>htmlspecialchars($_SESSION['userkullanici_id']) 
    ));

    if ($insert) {

    $kullanici_gelen=$_POST['kullanici_gelen'];

        Header("Location:../../gelen-mesajlar.php?durum=ok");
        
         } else {
           Header("Location:../../gelen-mesajlar.php?durum=hata");
         }
     }


	 

     if ($_GET['gedenmesajsil']=="ok") {
	
        $sil=$db->prepare("DELETE from mesaj where mesaj_id=:mesaj_id");
        $kontrol=$sil->execute(array(
            'mesaj_id' => $_GET['mesaj_id']
            ));
    
        if ($kontrol) {
       
            Header("Location:../../geden-mesajlar.php?durum=ok");
    
        } else {
    
            Header("Location:../../geden-mesajlar.php?durum=hata");
        }
    
    
    }
    
    
    
    
    if ($_GET['gelenmesajsil']=="ok") {
        
        $sil=$db->prepare("DELETE from mesaj where mesaj_id=:mesaj_id");
        $kontrol=$sil->execute(array(
            'mesaj_id' => $_GET['mesaj_id']
            ));
    
        if ($kontrol) {
       
            Header("Location:../../gelen-mesajlar.php?durum=ok");
    
        } else {
    
            Header("Location:../../gelen-mesajlar.php?durum=hata");
        }
    
    
    }
    
?>