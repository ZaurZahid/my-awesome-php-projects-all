<?php 
ob_start();
session_start();
include 'baglan.php';  
include '../production/fonksiyon.php';  






if ($_GET['slidersil']=="ok") {
	islemKontrol();
	$sil=$db->prepare("DELETE from slider where slider_id=:id");
	$silme=$sil->execute(array(
		'id'=>$_GET['slider_id']
	)); 
   if ($silme) {
	$resimsilunlink=$_GET['slider_resimyol'];
			unlink("../../$resimsilunlink");

	   header("Location:../production/slider.php?silme=ok");

   } else {

	   header("Location:../production/slider.php?silme=no");
   }
   
}

// Slider Düzenleme Başla


if (isset($_POST['sliderduzenle'])) {

	
	if($_FILES['slider_resimyol']["size"] > 0)  { 


		$uploads_dir = '../../dimg/slider';
		@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
		@$name = $_FILES['slider_resimyol']["name"];
		$benzersizsayi1=rand(20000,32000);
		$benzersizsayi2=rand(20000,32000);
		$benzersizsayi3=rand(20000,32000);
		$benzersizsayi4=rand(20000,32000);
		$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");

		$duzenle=$db->prepare("UPDATE slider SET
			slider_ad=:ad,
			slider_link=:link,
			slider_sira=:sira,
			slider_durum=:durum,
			slider_resimyol=:resimyol	
			WHERE slider_id={$_POST['slider_id']}");
		$update=$duzenle->execute(array(
			'ad' => $_POST['slider_ad'],
			'link' => $_POST['slider_link'],
			'sira' => $_POST['slider_sira'],
			'durum' => $_POST['slider_durum'],
			'resimyol' => $refimgyol,
			));
		

		$slider_id=$_POST['slider_id'];

		if ($update) {

			$resimsilunlink=$_POST['slider_resimyol'];
			unlink("../../$resimsilunlink");

			Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");

		} else {

			Header("Location:../production/slider-duzenle.php?durum=no");
		}



	} else {

		$duzenle=$db->prepare("UPDATE slider SET
			slider_ad=:ad,
			slider_link=:link,
			slider_sira=:sira,
			slider_durum=:durum		
			WHERE slider_id={$_POST['slider_id']}");
		$update=$duzenle->execute(array(
			'ad' => $_POST['slider_ad'],
			'link' => $_POST['slider_link'],
			'sira' => $_POST['slider_sira'],
			'durum' => $_POST['slider_durum']
			));

		$slider_id=$_POST['slider_id'];

		if ($update) {

			Header("Location:../production/slider-duzenle.php?slider_id=$slider_id&durum=ok");

		} else {

			Header("Location:../production/slider-duzenle.php?durum=no");
		}
	}

}


// Slider Düzenleme Bitiş




if (isset($_POST['sliderkaydet'])) {


	$uploads_dir = '../../dimg/slider';
	@$tmp_name = $_FILES['slider_resimyol']["tmp_name"];
	@$name = $_FILES['slider_resimyol']["name"];
	//resmin isminin benzersiz olması
	$benzersizsayi1=rand(20000,32000);
	$benzersizsayi2=rand(20000,32000);
	$benzersizsayi3=rand(20000,32000);
	$benzersizsayi4=rand(20000,32000);	
	$benzersizad=$benzersizsayi1.$benzersizsayi2.$benzersizsayi3.$benzersizsayi4;
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizad.$name;
	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizad$name");
	


	$kaydet=$db->prepare("INSERT INTO slider SET
		slider_ad=:slider_ad,
		slider_sira=:slider_sira,
		slider_link=:slider_link,
		slider_resimyol=:slider_resimyol
		");
	$insert=$kaydet->execute(array(
		'slider_ad' => $_POST['slider_ad'],
		'slider_sira' => $_POST['slider_sira'],
		'slider_link' => $_POST['slider_link'],
		'slider_resimyol' => $refimgyol
		));

	if ($insert) {

		Header("Location:../production/slider.php?durum=ok");

	} else {

		Header("Location:../production/slider.php?durum=no");
	}




}







if (isset($_POST['admingiris'])) {

	$kullanici_mail= $_POST['kullanici_mail'];
	$kullanici_password= md5($_POST['kullanici_password']);

	$kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_mail=:mail and kullanici_password=:password");
	$kullanicisor->execute(array( 
		'mail'=>$kullanici_mail,
		'password'=>$kullanici_password
	));
	$say=$kullanicisor->rowCount();
 
 	if($say==1){
		$_SESSION["kullanici_mail"]=$kullanici_mail;
		header("location:../production/index.php"); 
	}
	else{
		header("location:../production/login.php?durum=no");
	}
 
 }

if (isset($_POST['hakkimizdakaydet'])) {
	
	//Tablo güncelleme işlemi kodları...

	/*

	copy paste işlemlerinde tablo ve işaretli satır isminin değiştirildiğinden emin olun!!!

	*/
	$ayarkaydet=$db->prepare("UPDATE hakkimizda SET
		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_icerik=:hakkimizda_icerik,
		hakkimizda_video=:hakkimizda_video,
		hakkimizda_vizyon=:hakkimizda_vizyon,
		hakkimizda_misyon=:hakkimizda_misyon
		WHERE hakkimizda_id=0");

	$update=$ayarkaydet->execute(array(
		'hakkimizda_baslik' => $_POST['hakkimizda_baslik'],
		'hakkimizda_icerik' => $_POST['hakkimizda_icerik'],
		'hakkimizda_video' => $_POST['hakkimizda_video'],
		'hakkimizda_vizyon' => $_POST['hakkimizda_vizyon'],
		'hakkimizda_misyon' => $_POST['hakkimizda_misyon']
		));


	if ($update) {

		header("Location:../production/hakkimizda.php?durum=ok");

	} else {

		header("Location:../production/hakkimizda.php?durum=no");
	}
	
}



if (isset($_POST['hakkimizdakaydet'])) {
	
	//Tablo güncelleme işlemi kodları...

	/*

	copy paste işlemlerinde tablo ve işaretli satır isminin değiştirildiğinden emin olun!!!

	*/
	$ayarkaydet=$db->prepare("UPDATE hakkimizda SET
		hakkimizda_baslik=:hakkimizda_baslik,
		hakkimizda_icerik=:hakkimizda_icerik,
		hakkimizda_video=:hakkimizda_video,
		hakkimizda_vizyon=:hakkimizda_vizyon,
		hakkimizda_misyon=:hakkimizda_misyon
		WHERE hakkimizda_id=0");

	$update=$ayarkaydet->execute(array(
		'hakkimizda_baslik' => $_POST['hakkimizda_baslik'],
		'hakkimizda_icerik' => $_POST['hakkimizda_icerik'],
		'hakkimizda_video' => $_POST['hakkimizda_video'],
		'hakkimizda_vizyon' => $_POST['hakkimizda_vizyon'],
		'hakkimizda_misyon' => $_POST['hakkimizda_misyon']
		));


	if ($update) {

		header("Location:../production/hakkimizda.php?durum=ok");

	} else {

		header("Location:../production/hakkimizda.php?durum=no");
	}
	
}



if (isset($_POST['kullaniciduzenle'])) {

	$kullanici_id=$_POST['kullanici_id'];

	$ayarkaydet=$db->prepare("UPDATE kullanici SET
		kullanici_tc=:kullanici_tc,
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_durum=:kullanici_durum
		WHERE kullanici_id=$kullanici_id");

	$update=$ayarkaydet->execute(array(
		'kullanici_tc' => $_POST['kullanici_tc'],
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_durum' => $_POST['kullanici_durum']
		));


	if ($update) {

		Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=ok");

	} else {

		Header("Location:../production/kullanici-duzenle.php?kullanici_id=$kullanici_id&durum=no");
	}

}


if ($_GET['kullanicisil']=="ok") {
	islemKontrol();
	 $sil=$db->prepare("DELETE from kullanici where kullanici_id=:id");
	 $silme=$sil->execute(array(
		 'id'=>$_GET['kullanici_id']
	 )); 
	if ($silme) {

		header("Location:../production/kullanici.php?silme=ok");

	} else {

		header("Location:../production/kullanici.php?silme=no");
	}
	
}



if (isset($_POST['menuduzenle'])) {

	$menu_id=$_POST['menu_id'];

	$menu_seourl=seo($_POST['menu_ad']);

	
	$ayarkaydet=$db->prepare("UPDATE menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl,
		menu_durum=:menu_durum
		WHERE menu_id=$menu_id");

	$update=$ayarkaydet->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_seourl' => $menu_seourl,
		'menu_durum' => $_POST['menu_durum']
		));


	if ($update) {

		Header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=ok");

	} else {

		Header("Location:../production/menu-duzenle.php?menu_id=$menu_id&durum=no");
	}

}
if ($_GET['menusil']=="ok") {
	islemKontrol();
	$sil=$db->prepare("DELETE from menu where menu_id=:id");
	$silme=$sil->execute(array(
		'id'=>$_GET['menu_id']
	)); 
   if ($silme) {

	   header("Location:../production/menu.php?silme=ok");

   } else {

	   header("Location:../production/menu.php?silme=no");
   }
   
}



if (isset($_POST['menukaydet'])) {


	$menu_seourl=seo($_POST['menu_ad']);


	$ayarekle=$db->prepare("INSERT INTO menu SET
		menu_ad=:menu_ad,
		menu_detay=:menu_detay,
		menu_url=:menu_url,
		menu_sira=:menu_sira,
		menu_seourl=:menu_seourl 
		");

	$insert=$ayarekle->execute(array(
		'menu_ad' => $_POST['menu_ad'],
		'menu_detay' => $_POST['menu_detay'],
		'menu_url' => $_POST['menu_url'],
		'menu_sira' => $_POST['menu_sira'],
		'menu_seourl' => $menu_seourl 
 		));


	if ($insert) {

		Header("Location:../production/menu.php?durum=ok");

	} else {

		Header("Location:../production/menu.php?durum=no");
	}

}



if ($_GET['kategorisil']=="ok") {
	islemKontrol();
	$sil=$db->prepare("DELETE from kategori where kategori_id=:id");
	$silme=$sil->execute(array(
		'id'=>$_GET['kategori_id']
	)); 
   if ($silme) {

	   header("Location:../production/kategori.php?silme=ok");

   } else {

	   header("Location:../production/kategori.php?silme=no");
   }
   
}



if (isset($_POST['kategorikaydet'])) {


	$kategori_seourl=seo($_POST['kategori_ad']);


	$ayarekle=$db->prepare("INSERT INTO kategori SET
		kategori_ad=:kategori_ad,
		kategori_sira=:kategori_sira,
		kategori_seourl=:kategori_seourl 
		");

	$insert=$ayarekle->execute(array(
		'kategori_ad' => $_POST['kategori_ad'],
		'kategori_sira' => $_POST['kategori_sira'],
		'kategori_seourl' => $kategori_seourl 
 		));


	if ($insert) {

		Header("Location:../production/kategori.php?durum=ok");

	} else {

		Header("Location:../production/kategori.php?durum=no");
	}

}

if ($_GET['urunsil']=="ok") {
	islemKontrol();
	$sil=$db->prepare("DELETE from urun where urun_id=:id");
	$silme=$sil->execute(array(
		'id'=>$_GET['urun_id']
	)); 
   if ($silme) {

	   header("Location:../production/urun.php?silme=ok");

   } else {

	   header("Location:../production/urun.php?silme=no");
   }
   
}

if (isset($_POST['urunduzenle'])) {


	if (isset($_POST['urunduzenle'])) {

		$urun_id=$_POST['urun_id'];
		$urun_seourl=seo($_POST['urun_ad']);
	
		$kaydet=$db->prepare("UPDATE urun SET
			kategori_id=:kategori_id,
			urun_ad=:urun_ad,
			urun_detay=:urun_detay,
			urun_fiyat=:urun_fiyat,
			urun_video=:urun_video,
			urun_onecikar=:urun_onecikar,
			urun_keyword=:urun_keyword,
			urun_durum=:urun_durum,
			urun_stok=:urun_stok,	
			urun_seourl=:seourl		
			WHERE urun_id={$_POST['urun_id']}");
		$update=$kaydet->execute(array(
			'kategori_id' => $_POST['kategori_id'],
			'urun_ad' => $_POST['urun_ad'],
			'urun_detay' => $_POST['urun_detay'],
			'urun_fiyat' => $_POST['urun_fiyat'],
			'urun_video' => $_POST['urun_video'],
			'urun_onecikar' => $_POST['urun_onecikar'],
			'urun_keyword' => $_POST['urun_keyword'],
			'urun_durum' => $_POST['urun_durum'],
			'urun_stok' => $_POST['urun_stok'],
			'seourl' => $urun_seourl
	
			));
	
		if ($update) {
	
			Header("Location:../production/urun-duzenle.php?durum=ok&urun_id=$urun_id");
	
		} else {
	
			Header("Location:../production/urun-duzenle.php?durum=no&urun_id=$urun_id");
		}
	
	}
	
}


if (isset($_POST['urunkaydet'])) {

	$urun_seourl=seo($_POST['urun_ad']);

	$kaydet=$db->prepare("INSERT INTO urun SET
		kategori_id=:kategori_id,
		urun_ad=:urun_ad,
		urun_detay=:urun_detay,
		urun_fiyat=:urun_fiyat,
		urun_video=:urun_video,
		urun_keyword=:urun_keyword,
		urun_durum=:urun_durum,
		urun_stok=:urun_stok,	
		urun_seourl=:seourl		
		");
	$insert=$kaydet->execute(array(
		'kategori_id' => $_POST['kategori_id'],
		'urun_ad' => $_POST['urun_ad'],
		'urun_detay' => $_POST['urun_detay'],
		'urun_fiyat' => $_POST['urun_fiyat'],
		'urun_video' => $_POST['urun_video'],
		'urun_keyword' => $_POST['urun_keyword'],
		'urun_durum' => $_POST['urun_durum'],
		'urun_stok' => $_POST['urun_stok'],
		'seourl' => $urun_seourl

		));

	if ($insert) {

		Header("Location:../production/urun.php?durum=ok");

	} else {

		Header("Location:../production/urun.php?durum=no");
	}
}


if (isset($_POST['yorumkaydet'])) {

	$gelen_url=htmlspecialchars($_SERVER['HTTP_REFERER']); 
	$gelen_urlok=str_replace('?durum=ok','',$gelen_url);
	
	
	$ayarekle=$db->prepare("INSERT INTO yorumlar SET
		yorum_detay=:yorum_detay,
		kullanici_id=:kullanici_id,
		urun_id=:urun_id	
		
		");

	$insert=$ayarekle->execute(array(
		'yorum_detay' => $_POST['yorum_detay'],
		'kullanici_id' => $_POST['kullanici_id'],
		'urun_id' => $_POST['urun_id']
		
		));


	if ($insert) {

		Header("Location:$gelen_urlok?durum=ok");

	} else {

		Header("Location:$gelen_urlok?durum=no");
	}

}


if (isset($_POST['sepetekle'])) {

 
	$ayarekle=$db->prepare("INSERT INTO sepet  SET
		urun_adet=:urun_adet,
		kullanici_id=:kullanici_id,
		urun_id=:urun_id	
		
		");

	$insert=$ayarekle->execute(array(
		'urun_adet' => $_POST['urun_adet'],
		'kullanici_id' => $_POST['kullanici_id'],
		'urun_id' => $_POST['urun_id']
		
		));


	if ($insert) {

		Header("Location:../../sepet.php?durum=ok");

	} else {

		Header("Location:../../sepet.php?durum=no");
	}

}
 

if ($_GET['urun_onecikar']=='ok') { 
		$kaydet=$db->prepare("UPDATE urun SET 
			urun_onecikar=:urun_onecikar		
			WHERE urun_id={$_GET['urun_id']}");
		$update=$kaydet->execute(array( 
			'urun_onecikar' =>$_GET['urun_one'] 
			));
	
		if ($update) {
	
			Header("Location:../production/urun.php?durum=ok");
	
		} else {
	
			Header("Location:../production/urun.php?durum=no");
		}
	
	}
	if ($_GET['yorum_onecikar']=='ok') { 
		$kaydet=$db->prepare("UPDATE yorumlar SET 
			yorum_onay=:yorum_onay		
			WHERE yorum_id={$_GET['yorum_id']}");
		$update=$kaydet->execute(array( 
			'yorum_onay' =>$_GET['yorum_onay'] 
			));
	
		if ($update) {
	
			Header("Location:../production/yorum.php?durum=ok");
	
		} else {
	
			Header("Location:../production/yorum.php?durum=no");
		}
	
	}
 

	if ($_GET['yorumsil']=="ok") {
		islemKontrol();
		$sil=$db->prepare("DELETE from yorumlar where yorum_id=:id");
		$silme=$sil->execute(array(
			'id'=>$_GET['yorum_id']
		)); 
	   if ($silme) {
   
		   header("Location:../production/yorum.php?silme=ok");
   
	   } else {
   
		   header("Location:../production/yorum.php?silme=no");
	   }
	   
   }



   if (isset($_POST['bankakaydet'])) { 
	$ayarekle=$db->prepare("INSERT INTO banka SET
		banka_ad=:banka_ad,
		banka_iban=:banka_iban,
        banka_hesapadsoyad=:banka_hesapadsoyad,
		banka_durum=:banka_durum 
		");

	$insert=$ayarekle->execute(array(
		'banka_ad' => $_POST['banka_ad'],
		'banka_iban' => $_POST['banka_iban'],
        'banka_hesapadsoyad' => $_POST['banka_hesapadsoyad'],
		'banka_durum' =>$_POST['banka_durum']
 		));


	if ($insert) {

		Header("Location:../production/banka.php?durum=ok");

	} else {

		Header("Location:../production/banka.php?durum=no");
	}

}

if (isset($_POST['bankaduzenle'])) {

	$banka_id=$_POST['banka_id']; 
	
	$ayarkaydet=$db->prepare("UPDATE banka SET
		banka_ad=:banka_ad, 
		banka_iban=:banka_iban, 
     	banka_hesapadsoyad=:banka_hesapadsoyad,  
		banka_durum=:banka_durum
		WHERE banka_id=$banka_id");

	$update=$ayarkaydet->execute(array(
		'banka_ad' => $_POST['banka_ad'],
		'banka_iban' => $_POST['banka_iban'], 
        'banka_hesapadsoyad' => $_POST['banka_hesapadsoyad'], 
		'banka_durum' => $_POST['banka_durum']
		));


	if ($update) {

		Header("Location:../production/banka-duzenle.php?banka_id=$banka_id&durum=ok");

	} else {

		Header("Location:../production/banka-duzenle.php?banka_id=$banka_id&durum=no");
	}

}

if ($_GET['bankasil']=="ok") {
	islemKontrol();
	$sil=$db->prepare("DELETE from banka where banka_id=:id");
	$silme=$sil->execute(array(
		'id'=>$_GET['banka_id']
	)); 
   if ($silme) {

	   header("Location:../production/banka.php?silme=ok");

   } else {

	   header("Location:../production/banka.php?silme=no");
   }
   
}

if (isset($_POST['kullanicibilgiguncelle'])) {

	$kullanici_id=$_POST['kullanici_id'];

	$ayarkaydet=$db->prepare("UPDATE kullanici SET
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_il=:kullanici_il,
		kullanici_ilce=:kullanici_ilce
		WHERE kullanici_id={$_POST['kullanici_id']}");

	$update=$ayarkaydet->execute(array(
		'kullanici_adsoyad' => $_POST['kullanici_adsoyad'],
		'kullanici_il' => $_POST['kullanici_il'],
		'kullanici_ilce' => $_POST['kullanici_ilce']
		));


	if ($update) {

		Header("Location:../../hesabim?durum=ok");

	} else {

		Header("Location:../../hesabim?durum=no");
	}

}



if (isset($_POST['kullanicisifreguncelle'])) {

	echo $kullanici_eskipassword=trim($_POST['kullanici_eskipassword']); echo "<br>";
	echo $kullanici_passwordone=trim($_POST['kullanici_passwordone']); echo "<br>";
	echo $kullanici_passwordtwo=trim($_POST['kullanici_passwordtwo']); echo "<br>";

	$kullanici_password=md5($kullanici_eskipassword);


	$kullanicisor=$db->prepare("select * from kullanici where kullanici_password=:password");
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
					kullanici_password=:kullanici_password
					WHERE kullanici_id={$_POST['kullanici_id']}");

				
				$insert=$kullanicikaydet->execute(array(
					'kullanici_password' => $password
					));

				if ($insert) {


					header("Location:../../sifre-guncelle.php?durum=sifredegisti");


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

	exit;

	if ($update) {

		header("Location:../../sifre-guncelle?durum=ok");

	} else {

		header("Location:../../sifre-guncelle?durum=no");
	}

}


if (isset($_POST['bankasiparisekle'])) {


	$siparis_tip="Banka Havalesi";


	$kaydet=$db->prepare("INSERT INTO siparis SET
		kullanici_id=:kullanici_id,
		siparis_tip=:siparis_tip,	
		siparis_banka=:siparis_banka,
		siparis_toplam=:siparis_toplam
		");
	$insert=$kaydet->execute(array(
		'kullanici_id' => $_POST['kullanici_id'],
		'siparis_tip' => $siparis_tip,
		'siparis_banka' => $_POST['siparis_banka'],
		'siparis_toplam' => $_POST['siparis_toplam']		
		));
 

		if ($insert) {

			//Sipariş başarılı kaydedilirse...
	
			echo $siparis_id = $db->lastInsertId();
	
			echo "<hr>";
	
	
			$kullanici_id=$_POST['kullanici_id'];
			$sepetsor=$db->prepare("SELECT * FROM sepet where kullanici_id=:id");
			$sepetsor->execute(array(
				'id' => $kullanici_id
				));
	
			while($sepetcek=$sepetsor->fetch(PDO::FETCH_ASSOC)) {
	
			 	$urun_id=$sepetcek['urun_id']; 
			 	$urun_adet=$sepetcek['urun_adet'];
			 
				$urunsor=$db->prepare("SELECT * FROM urun where urun_id=:id");
				$urunsor->execute(array(
					'id' => $urun_id
					));
	
				$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
			
				$urun_fiyat=$uruncek['urun_fiyat'];

	 	
				$kaydet=$db->prepare("INSERT INTO siparis_detay SET
					
					siparis_id=:siparis_id,
					urun_id=:urun_id,	
					urun_fiyat=:urun_fiyat,
					urun_adet=:urun_adet
					");
				$insert=$kaydet->execute(array(
					'siparis_id' => $siparis_id,
					'urun_id' => $urun_id,
					'urun_fiyat' => $urun_fiyat,
					'urun_adet' => $urun_adet
	
					));
	
	
			}

			if ($insert) {

			

				//Sipariş detay kayıtta başarıysa sepeti boşalt
	
				$sil=$db->prepare("DELETE from sepet where kullanici_id=:kullanici_id");
				$kontrol=$sil->execute(array(
					'kullanici_id' => $kullanici_id
					));
	
				
				Header("Location:../../sepet.php?durum=ok");
				exit;
	
	
			}
	

	 
		} else {
	
			echo "başarısız";
	
			//Header("Location:../production/siparis.php?durum=no");
		}
	
	

	}
 
?>