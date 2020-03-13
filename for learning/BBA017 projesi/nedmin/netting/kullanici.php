


<?php
  ob_start();
  session_start();
include 'baglan.php';
include '../production/fonksiyon.php';


if (isset($_POST['musterikaydet'])) {
 
	  $kullanici_mail=htmlspecialchars(trim($_POST['kullanici_mail']));  
	  $kullanici_passwordone=htmlspecialchars(trim($_POST['kullanici_passwordone']));  
	  $kullanici_passwordtwo=htmlspecialchars(trim($_POST['kullanici_passwordtwo']));  



	if ($kullanici_passwordone==$kullanici_passwordtwo) {
 
		if (strlen($kullanici_passwordone)>=6) {
		 
 
// Başlangıç

			$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
			$kullanicisor->execute(array(
				'mail' => $kullanici_mail
				));

			//dönen satır sayısını belirtir
			$say=$kullanicisor->rowCount();


//yeni hec kim evvel bura girmeyibse say=0 olur
			if ($say==0) {

				//md5 fonksiyonu şifreyi md5 şifreli hale getirir.
				$password=md5($kullanici_passwordone);

				$kullanici_yetki=0;

			//Kullanıcı kayıt işlemi yapılıyor...
				$kullanicikaydet=$db->prepare("INSERT INTO kullanici SET
					kullanici_ad=:kullanici_ad,
					kullanici_soyad=:kullanici_soyad,
					kullanici_mail=:kullanici_mail,
					kullanici_password=:kullanici_password,
					kullanici_yetki=:kullanici_yetki
					");
				$insert=$kullanicikaydet->execute(array(
					'kullanici_ad' => htmlspecialchars($_POST['kullanici_ad']),					
					'kullanici_soyad' => htmlspecialchars($_POST['kullanici_soyad']),
					'kullanici_mail' => $kullanici_mail,
					'kullanici_password' => $password,
					'kullanici_yetki' => $kullanici_yetki
					));

				if ($insert) {


					header("Location:../../login?durum=loginbasarili");


 
				} else {


					header("Location:../../register?durum=basarisiz");
				}

			} else {

				header("Location:../../register?durum=mukerrerkayit");



			}




		// Bitiş



		} else {


			header("Location:../../register?durum=eksiksifre");


		}



	} else {



		header("Location:../../register?durum=farklisifre");
	}
	


}



if (isset($_POST['musterigiris'])) {
	
/* 	require_once '../../securimage/securimage.php';
	
		$securimage = new Securimage();
	
		if ($securimage->check($_POST['captcha_code']) == false) {
	
			header("Location:../../login?durum=captchahata");
			exit;
	 
		}*/
		echo $kullanici_mail=htmlspecialchars($_POST['kullanici_mail']); 
		echo $kullanici_password=md5(htmlspecialchars($_POST['kullanici_password'])); 
	
	
	
		$kullanicisor=$db->prepare("select * from kullanici where kullanici_mail=:mail and kullanici_yetki=:yetki and kullanici_password=:password and kullanici_durum=:durum");
		$kullanicisor->execute(array(
			'mail' => $kullanici_mail,
			'yetki' => 0,
			'password' => $kullanici_password,
			'durum' => 1
			));
	
	
		$say=$kullanicisor->rowCount();
	

		if ($say==1) { 
		    $_SESSION['userkullanici_mail']=$kullanici_mail;
			header("Location:../../xosgeldin?durum=ok");
			exit;
			 
	
		} else {
	
	
			header("Location:../../login?durum=hata");
	
		}
	
	}
	
if (isset($_POST['hesabimbilgiduzelt'])){
$bilgiduzelt=$db->prepare("UPDATE kullanici set
kullanici_ad=:ad,
kullanici_soyad=:soyad,
kullanici_tel=:tel 
where kullanici_id={$_SESSION['userkullanici_id']}");

$update=$bilgiduzelt->execute(array(
	'ad'=>$_POST['kullanici_ad'],
	'soyad'=>$_POST['kullanici_soyad'],
	'tel'=>$_POST['kullanici_tel'] 
));
  if ($update) {
	header("Location:../../hesab_bilgileri.php?durum=ok");
	
} else {
	header("Location:../../hesab_bilgileri.php?durum=no");
}  

} 


if (isset($_POST['hesabimadressduzelt'])){
	$bilgiduzelt=$db->prepare("UPDATE kullanici set
	kullanici_adress=:kullanici_adress,
	kullanici_seher=:kullanici_seher,
	kullanici_olke=:kullanici_olke 
	where kullanici_id={$_SESSION['userkullanici_id']}");
	
	$update=$bilgiduzelt->execute(array(
		'kullanici_adress'=>$_POST['kullanici_adress'],
		'kullanici_seher'=>$_POST['kullanici_seher'],
		'kullanici_olke'=>$_POST['kullanici_olke'] 
	));
	  if ($update) {
		header("Location:../../adress_bilgileri.php?durum=ok");
		
	} else {
		header("Location:../../adress_bilgileri.php?durum=no");
	}  
	
	} 


	if (isset($_POST['isdifadecisifreduzelt'])){
$indiki_sifre=htmlspecialchars($_POST['indiki_sifre']);
$yeni_sifre=htmlspecialchars($_POST['yeni_sifre']);
$yenitekrar_sifre=htmlspecialchars($_POST['yenitekrar_sifre']);

$indiki_password=md5($indiki_sifre);

$kullanicisor=$db->prepare("select*from kullanici where kullanici_password=:password");
$kullanicisor->execute(array(
'password'=>$indiki_password
));
$say=$kullanicisor->rowCount();

if ($say==0) {
	header("location:../../sifre_guncelle.php?durum=indikisifrenizhata");
	exit;
} 


if($yeni_sifre=$yenitekrar_sifre){


if (strlen($yeni_sifre)>=6) {
	$sifre=md5($yeni_sifre);
		$bilgiduzelt=$db->prepare("UPDATE kullanici set
		kullanici_password=:password
		where kullanici_id={$_SESSION['userkullanici_id']}");
		
		$update=$bilgiduzelt->execute(array(
			'password'=> $sifre
		));

		  if ($update) {
			header("Location:../../sifre_guncelle.php?durum=ok");
			
		} else {
			header("Location:../../sifre_guncelle.php?durum=no");
		}  


} else {
	header("location:../../sifre_guncelle.php?durum=sifrenizinsayisehvdir");
}


} else {
	header("location:../../sifre_guncelle.php?durum=sifrelerinizeynideyil");
}
 }  


 ////////////////////////profil sekli deyisme
 if (isset($_POST['profilresimduzelt'])) {
    
       
       if ($_FILES['kullanici_foto']['size']>1048576) {
           
           echo "Bu dosya boyutu çok büyük";
   
           Header("Location:../../profil_resmiduzelt.php?durum=dosyabuyuk");
   
       }
   
   
       $izinli_uzantilar=array('jpg','png');
   
       //echo $_FILES['ayar_logo']["name"];
   
       $ext=strtolower(substr($_FILES['kullanici_foto']["name"],strpos($_FILES['kullanici_foto']["name"],'.')+1));
   
       if (in_array($ext, $izinli_uzantilar) === false) {
           echo "Bu uzantı kabul edilmiyor";
           Header("Location:../../profil_resmiduzelt.php?durum=formathata");
   
           exit;
       }
   
   
       $uploads_dir = '../../dimg/profilsekli';
   
       @$tmp_name = $_FILES['kullanici_foto']["tmp_name"];
       @$name = $_FILES['kullanici_foto']["name"];
   
       $benzersizsayi4=uniqid();
       $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;
   
       @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
   
       
       $duzenle=$db->prepare("UPDATE kullanici SET
           kullanici_foto=:kullanici_foto
           WHERE kullanici_id={$_SESSION['userkullanici_id']}");
       $update=$duzenle->execute(array(
           'kullanici_foto' => $refimgyol
       ));
   
   
   
       if ($update) {
   
           $resimsilunlink=$_POST['eski_yol'];
           unlink("../../$resimsilunlink");
   
           Header("Location:../../profil_resmiduzelt.php?durum=ok");
   
       } else {
   
           Header("Location:../../profil_resmiduzelt.php?durum=no");
       }
   
   }
   
 

   if(isset($_POST['mesajgonder'])){
	
	$kaydet=$db->prepare("INSERT INTO mesaj set
	
	mesaj_detay=:mesaj_detay,
	kullanici_mesajgelen=:kullanici_mesajgelen,
	kullanici_mesajgonderen=:kullanici_mesajgonderen 

	
	");
	$insert=$kaydet->execute(array(
	
	'mesaj_detay'=> $_POST['mesaj_detay'] ,
	'kullanici_mesajgelen'=>htmlspecialchars($_POST['kullanici_mesajgelen']),
	'kullanici_mesajgonderen'=>htmlspecialchars($_SESSION['userkullanici_id']) 
	));

	if ($insert) {

	$kullanici_mesajgelen=$_POST['kullanici_mesajgelen'];

		Header("Location:../../mesaj_gonder.php?durum=ok&kullanici_mesajgelen=$kullanici_mesajgelen");
		
		 } else {
		   Header("Location:../../mesaj_gonder.php?durum=hata");
		 }
	 }


	 if(isset($_POST['mesajcavabver'])){
		
		$kaydet=$db->prepare("INSERT INTO mesaj set
		
		mesaj_detay=:mesaj_detay,
		kullanici_mesajgelen=:kullanici_mesajgelen,
		kullanici_mesajgonderen=:kullanici_mesajgonderen 
	
		
		");
		$insert=$kaydet->execute(array(
		
		'mesaj_detay'=> $_POST['mesaj_detay'] ,
		'kullanici_mesajgelen'=>htmlspecialchars($_POST['kullanici_mesajgelen']),
		'kullanici_mesajgonderen'=>htmlspecialchars($_SESSION['userkullanici_id']) 
		));
	
		if ($insert) {
	
		$kullanici_mesajgelen=$_POST['kullanici_mesajgelen'];
	
			Header("Location:../../gelen_mesajlar.php?durum=ok");
			
			 } else {
			   Header("Location:../../gelen_mesajlar.php?durum=hata");
			 }
		 }
	


		 if ($_GET['mesajsil']=="ok") {
			
			$sil=$db->prepare("DELETE from mesaj where mesaj_id=:mesaj_id");
			$kontrol=$sil->execute(array(
				'mesaj_id' => $_GET['mesaj_id']
				));
		
			if ($kontrol) {
		  
				 
			 
				Header("Location:../../geden_mesajlar.php?durum=ok");
		
			} else {
		
				Header("Location:../../geden_mesajlar.php?durum=hata");
			}
		
		}
		 
		if ($_GET['gelenmesajsil']=="ok") {
			
			$sil=$db->prepare("DELETE from mesaj where mesaj_id=:mesaj_id");
			$kontrol=$sil->execute(array(
				'mesaj_id' => $_GET['mesaj_id']
				));
		
			if ($kontrol) {
		  
				 
			 
				Header("Location:../../gelen_mesajlar.php?durum=ok");
		
			} else {
		
				Header("Location:../../gelen_mesajlar.php?durum=hata");
			}
		
		}
		 
	
?>