<?php 
ob_start();
session_start();
include 'baglan.php';  
include '../production/fonksiyon.php';  



if (isset($_POST['logoduzenle'])) { 
    //1mb dan yuxarilar alinmayacaq
   
       if($_FILES['ayar_logo']['size']>1048576){
               echo "get qarnivi qasi ,seklin hecmi cox boyuydur.";
               Header("Location:../production/genel-ayar.php?durum=dosyabuyuk");
   
               exit;
       }
       $izinli_uzantilar=['jpg','gif','png'];
       $img_uzanti=strtolower(substr($_FILES['ayar_logo']["name"],strpos($_FILES['ayar_logo']["name"],".")+1));
        
   
       if(in_array($img_uzanti,$izinli_uzantilar)===false){
       echo "bu uzantiya icaze yoxdur";
       Header("Location:../production/genel-ayar.php?durum=uzantiizinsiz");
       exit ;
       }
   
       $uploads_dir = '../../dimg';
         @$tmp_name = $_FILES['ayar_logo']["tmp_name"];
       @$name = $_FILES['ayar_logo']["name"];
   
       $benzersizsayi4=rand(20000,32000);
       $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;
   
       @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
   
       
       $duzenle=$db->prepare("UPDATE ayar SET
           ayar_logo=:logo
           WHERE ayar_id=1");
       $update=$duzenle->execute(array(
           'logo' => $refimgyol
           ));
   
   
   
       if ($update) {
   
           $resimsilunlink=$_POST['eski_yol'];
           unlink("../../$resimsilunlink");
   
           Header("Location:../production/genel-ayar.php?durum=ok");
   
       } else {
   
           Header("Location:../production/genel-ayar.php?durum=no");
       }
   
   } 

   if (isset($_POST['genelayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_title=:ayar_title,
		ayar_description=:ayar_description,
		ayar_keywords=:ayar_keywords,
		ayar_author=:ayar_author
		WHERE ayar_id=1");

	$update=$ayarkaydet->execute(array(
		'ayar_title' => $_POST['ayar_title'],
		'ayar_description' => $_POST['ayar_description'],
		'ayar_keywords' => $_POST['ayar_keywords'],
		'ayar_author' => $_POST['ayar_author']
		));


	if ($update) {

		header("Location:../production/genel-ayar.php?durum=ok");

	} else {

		header("Location:../production/genel-ayar.php?durum=no");
	}
	
}


if (isset($_POST['apiayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		
		ayar_analystic=:ayar_analystic,
		ayar_maps=:ayar_maps,
		ayar_zopim=:ayar_zopim
		WHERE ayar_id=1");

	$update=$ayarkaydet->execute(array(

		'ayar_analystic' => $_POST['ayar_analystic'],
		'ayar_maps' => $_POST['ayar_maps'],
		'ayar_zopim' => $_POST['ayar_zopim']
		));


	if ($update) {

		header("Location:../production/api-ayarlar.php?durum=ok");

	} else {

		header("Location:../production/api-ayarlar.php?durum=no");
	}
	
}

if (isset($_POST['iletisimayarkaydet'])) {
	
	//Tablo güncelleme işlemi kodları...
	$ayarkaydet=$db->prepare("UPDATE ayar SET
		ayar_tel=:ayar_tel,
		ayar_gsm=:ayar_gsm,
		ayar_faks=:ayar_faks,
		ayar_mail=:ayar_mail,
		ayar_ilce=:ayar_ilce,
		ayar_il=:ayar_il,
		ayar_adres=:ayar_adres,
		ayar_mesai=:ayar_mesai
		WHERE ayar_id=1");

	$update=$ayarkaydet->execute(array(
		'ayar_tel' => $_POST['ayar_tel'],
		'ayar_gsm' => $_POST['ayar_gsm'],
		'ayar_faks' => $_POST['ayar_faks'],
		'ayar_mail' => $_POST['ayar_mail'],
		'ayar_ilce' => $_POST['ayar_ilce'],
		'ayar_il' => $_POST['ayar_il'],
		'ayar_adres' => $_POST['ayar_adres'],
		'ayar_mesai' => $_POST['ayar_mesai']
		));


	if ($update) {

		header("Location:../production/iletisim-ayarlar.php?durum=ok");

	} else {

		header("Location:../production/iletisim-ayarlar.php?durum=no");
	}
	
}

 
if (isset($_POST['adminkullaniciduzenle'])) {


	$kullanici_id=$_POST['kullanici_id'];


	   $kullaniciguncelle=$db->prepare("UPDATE kullanici SET
		   
		           kullanici_ad=:kullanici_ad,
				   kullanici_soyad=:kullanici_soyad,
				   kullanici_gsm=:kullanici_gsm,
				   kullanici_tc=:kullanici_tc,
				   kullanici_adres=:kullanici_adres,
				   kullanici_il=:kullanici_il,
				   kullanici_ilce=:kullanici_ilce,
				   kullanici_durum=:kullanici_durum 

				   WHERE kullanici_id={$_POST['kullanici_id']} ");
		   
					$update=$kullaniciguncelle->execute(array(
		                	//hansilar sabit qalir adminde onlari yazmaq lazim deyil
			    	'kullanici_ad'=>htmlspecialchars($_POST['kullanici_ad']),
		     		'kullanici_soyad'=>htmlspecialchars($_POST['kullanici_soyad']),
					'kullanici_gsm'=>htmlspecialchars($_POST['kullanici_gsm']),
				    'kullanici_tc'=>htmlspecialchars($_POST['kullanici_tc']),
				    'kullanici_adres'=>htmlspecialchars($_POST['kullanici_adres']), 			
				    'kullanici_il'=>htmlspecialchars($_POST['kullanici_il']),
					'kullanici_ilce'=>htmlspecialchars($_POST['kullanici_ilce']),
					'kullanici_durum'=>htmlspecialchars($_POST['kullanici_durum']) 
					
					
				));
			   if ($update) {
			   Header("Location:../production/kullanici-duzenle.php?durum=ok&kullanici_id=$kullanici_id");
		   
			   } else {
			   Header("Location:../production/kullanici-duzenle.php?durum=hata&kullanici_id=$kullanici_id");
			   }
			
	   }

  if ($_GET['magazaonay']=="red") {
		$kullaniciguncelle=$db->prepare("UPDATE kullanici SET
		kullanici_magaza=:kullanici_magaza 
		WHERE kullanici_id={$_GET['kullanici_id']} ");
   

		$update=$kullaniciguncelle->execute(array(
	   'kullanici_magaza' => 0
			
			
		));
		if ($update) {
		Header("Location:../production/magazalar.php?durum=ok");
   
		} else {
		Header("Location:../production/magazalar.php?durum=no");
		}
	
 }
		   
 if (isset($_POST['magazaonaykayit'])) {
	
	$kullaniciguncelle=$db->prepare("UPDATE kullanici SET

		kullanici_ad=:kullanici_ad,
		kullanici_soyad=:kullanici_soyad,
		kullanici_gsm=:kullanici_gsm,
		kullanici_banka=:kullanici_banka,
		kullanici_iban=:kullanici_iban,
		kullanici_tc=:kullanici_tc,
		kullanici_unvan=:kullanici_unvan,
		kullanici_vdaire=:kullanici_vdaire,
		kullanici_vno=:kullanici_vno,
		kullanici_adres=:kullanici_adres,
		kullanici_il=:kullanici_il,
		kullanici_ilce=:kullanici_ilce,
		kullanici_magaza=:kullanici_magaza
		WHERE kullanici_id={$_POST['kullanici_id']} ");

		 $update=$kullaniciguncelle->execute(array(
		 'kullanici_ad'=>htmlspecialchars($_POST['kullanici_ad']),
		  'kullanici_soyad'=>htmlspecialchars($_POST['kullanici_soyad']),
		 'kullanici_gsm'=>htmlspecialchars($_POST['kullanici_gsm']),
		 'kullanici_banka'=>htmlspecialchars($_POST['kullanici_banka']),
		 'kullanici_iban'=>htmlspecialchars($_POST['kullanici_iban']),
		 'kullanici_tc'=>htmlspecialchars($_POST['kullanici_tc']),
		 'kullanici_unvan'=>htmlspecialchars($_POST['kullanici_unvan']),
		 'kullanici_vdaire'=>htmlspecialchars($_POST['kullanici_vdaire']),
		 'kullanici_vno'=>htmlspecialchars($_POST['kullanici_vno']),
		 'kullanici_adres'=>htmlspecialchars($_POST['kullanici_adres']),				
		 'kullanici_il'=>htmlspecialchars($_POST['kullanici_il']),
		 'kullanici_ilce'=>htmlspecialchars($_POST['kullanici_ilce']),
		 'kullanici_magaza'=> 2
		 
	 ));
	
	 if ($update) {
		 Header("Location:../production/magazalar.php?durum=ok");
	
		 } else {
		 Header("Location:../production/magazalar.php?durum=no");
		 }
	 
  }

  if (isset($_POST['kullaniciresimguncelle'])) {
				
				   
	if ($_FILES['kullanici_magazafoto']['size']>1048576) {
		
		echo "Bu dosya boyutu çok büyük";

		Header("Location:../../urun-ekle.php?durum=dosyabuyuk");

	}


	$izinli_uzantilar=array('jpg','png');

	//echo $_FILES['ayar_logo']["name"];

	$ext=strtolower(substr($_FILES['kullanici_magazafoto']["name"],strpos($_FILES['kullanici_magazafoto']["name"],'.')+1));

	if (in_array($ext, $izinli_uzantilar) === false) {
		echo "Bu uzantı kabul edilmiyor";
		Header("Location:../../profil-resim-guncelle.php?durum=formathata");

		exit;
	}


	
	@$tmp_name = $_FILES['kullanici_magazafoto']["tmp_name"];
	@$name = $_FILES['kullanici_magazafoto']["name"];
	//seo ile turkce de olsa adi sekilin eng e cevirir hec burda yazmisdim sildim lazim olmadi

	include('simpleimage.php');
	$image=new SimpleImage();
	$image->load($tmp_name);
	$image->resize(128,128);
	$image->save($tmp_name);


	$uploads_dir = '../../dimg/userphoto';

	$benzersizsayi4=uniqid();
	$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.".".$ext;

	@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4.$ext");

	
	$duzenle=$db->prepare("UPDATE kullanici SET
		kullanici_magazafoto=:kullanici_magazafoto
	 WHERE kullanici_id={$_SESSION['userkullanici_id']}");
	$update=$duzenle->execute(array(
		'kullanici_magazafoto' => $refimgyol
	));



	if ($update) {

		$resimsilunlink=$_POST['eski_yol'];
		//niye 2 dene qalxir ???????????????????
		unlink("../../$resimsilunlink");

		Header("Location:../../profil-resim-guncelle.php?durum=ok");

	} else {

		Header("Location:../../profil-resim-guncelle.php?durum=hata");
	}

}
       //magaza urun ekleme///////////////////////////
	   if (isset($_POST['magazaurunekle'])) {
	
	   
		if ($_FILES['urunfoto_resimyol']['size']>1048576) {
			
			echo "Bu dosya boyutu çok büyük";
	
			Header("Location:../../urun-ekle.php?durum=dosyabuyuk");
	
		}
	
	
		$izinli_uzantilar=array('jpg','png');
	
		//echo $_FILES['ayar_logo']["name"];
	
		$ext=strtolower(substr($_FILES['urunfoto_resimyol']["name"],strpos($_FILES['urunfoto_resimyol']["name"],'.')+1));
	
		if (in_array($ext, $izinli_uzantilar) === false) {
			echo "Bu uzantı kabul edilmiyor";
			Header("Location:../../urun-ekle.php?durum=formathata");
	
			exit;
		}
	
	
		$uploads_dir = '../../dimg/urunfoto';
	
		@$tmp_name = $_FILES['urunfoto_resimyol']["tmp_name"];
		@$name = $_FILES['urunfoto_resimyol']["name"];
		//seo ile turkce de olsa adi sekilin eng e cevirir hec burda yazmisdim sildim lazim olmadi
		include('simpleimage.php');
		$image=new SimpleImage();
		$image->load($tmp_name);
		$image->resize(60,40);
		$image->save($tmp_name);
	
	
		$benzersizsayi4=uniqid();
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.".".$ext;
	
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4.$ext");
	
		
		$kaydet=$db->prepare("INSERT INTO urun  set
 
			kategori_id=:kategori_id,
			kullanici_id=:kullanici_id,
			urun_ad=:urun_ad,
			urun_detay=:urun_detay,
			urun_fiyat=:urun_fiyat,
			urunfoto_resimyol=:urunfoto_resimyol
				");
		$insert=$kaydet->execute(array(
		  'kategori_id'=>htmlspecialchars($_POST['kategori_id']),
		  'kullanici_id'=>htmlspecialchars($_SESSION['userkullanici_id']),
		  'urun_ad'=>htmlspecialchars($_POST['urun_ad']),
		  'urun_detay'=>htmlspecialchars($_POST['urun_detay']),
		  'urun_fiyat'=>htmlspecialchars($_POST['urun_fiyat']),
		  'urunfoto_resimyol' => $refimgyol
		));
	
	
		if ($insert) {
	
	  
			Header("Location:../../urunlerim.php?durum=ok");
	
		} else {
	
			Header("Location:../../urun-ekle.php?durum=hata");
		}
	
	}
 

	
	//magaza urun duzenleme///////////////////////////
	if (isset($_POST['magazaurunduzenle'])) {
	 
	 if ($_FILES['urunfoto_resimyol']['size']>0) {
		if ($_FILES['urunfoto_resimyol']['size']>1048576) {
			
			echo "Bu dosya boyutu çok büyük";
	
			Header("Location:../../urun-duzenle.php?durum=dosyabuyuk");
	
		}
	
	
		$izinli_uzantilar=array('jpg','png');
	
		//echo $_FILES['ayar_logo']["name"];
	
		$ext=strtolower(substr($_FILES['urunfoto_resimyol']["name"],strpos($_FILES['urunfoto_resimyol']["name"],'.')+1));
	
		if (in_array($ext, $izinli_uzantilar) === false) {
			echo "Bu uzantı kabul edilmiyor";
			Header("Location:../../urun-duzenle.php?durum=formathata");
	
			exit;
		}
	
	
		$uploads_dir = '../../dimg/urunfoto';
	
		@$tmp_name = $_FILES['urunfoto_resimyol']["tmp_name"];
		@$name = $_FILES['urunfoto_resimyol']["name"];
		//seo ile turkce de olsa adi sekilin eng e cevirir hec burda yazmisdim sildim lazim olmadi
		include('simpleimage.php');
		$image=new SimpleImage();
		$image->load($tmp_name);
		$image->resize(60,40);
		$image->save($tmp_name);
	
	
		$benzersizsayi4=uniqid();
		$refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.".".$ext;
	
		@move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4.$ext");
	
		
		$kaydet=$db->prepare("UPDATE urun  set
 
			kategori_id=:kategori_id,
			urun_ad=:urun_ad,
			urun_detay=:urun_detay,
			urun_fiyat=:urun_fiyat,
			urunfoto_resimyol=:urunfoto_resimyol
			WHERE urun_id={$_POST['urun_id']}");
 
			   
		$insert=$kaydet->execute(array(
		  'kategori_id'=>htmlspecialchars($_POST['kategori_id']),
		  'urun_ad'=>htmlspecialchars($_POST['urun_ad']),
		  'urun_detay'=>htmlspecialchars($_POST['urun_detay']),
		  'urun_fiyat'=>htmlspecialchars($_POST['urun_fiyat']),
		  'urunfoto_resimyol' => $refimgyol
		));
	$urun_id =$_POST['urun_id'];
		if ($insert) {
			
		 $resimsilunlink=$_POST['eski_yol'];
		 unlink("../../$resimsilunlink");
	  
			Header("Location:../../urunlerim.php?durum=ok&urun_id=$urun_id");
	
		} else {
	
			Header("Location:../../urun-duzenle.php?durum=hata&urun_id=$urun_id");
		}
	
	}else {
		//foto yoxdursa......
		 
		$kaydet=$db->prepare("UPDATE urun  set
		
				   kategori_id=:kategori_id,
				   urun_ad=:urun_ad,
				   urun_detay=:urun_detay,
				   urun_fiyat=:urun_fiyat 
				   WHERE urun_id={$_POST['urun_id']}");
		
					  
			   $insert=$kaydet->execute(array(
				 'kategori_id'=>htmlspecialchars($_POST['kategori_id']),
				 'urun_ad'=>htmlspecialchars($_POST['urun_ad']),
				 'urun_detay'=>htmlspecialchars($_POST['urun_detay']),
				 'urun_fiyat'=>htmlspecialchars($_POST['urun_fiyat']) 
			   ));
		   $urun_id =$_POST['urun_id'];
			   if ($insert) {
			   
				   Header("Location:../../urunlerim.php?durum=ok&urun_id=$urun_id");
		   
			   } else {
		   
				   Header("Location:../../urun-duzenle.php?durum=hata&urun_id=$urun_id");
			   }
	}
 
 
 
	}
 
 
	if ($_GET['urunsil']=="ok") {
	 
	 $sil=$db->prepare("DELETE from urun where urun_id=:urun_id");
	 $kontrol=$sil->execute(array(
		 'urun_id' => $_GET['urun_id']
		 ));
 
	 if ($kontrol) {
   
		 $resimsilunlink=$_GET['urunfoto_resimyol'];
		 unlink("../../$resimsilunlink");
	  
		 Header("Location:../../urunlerim.php?durum=ok");
 
	 } else {
 
		 Header("Location:../../urunlerim.php?durum=hata");
	 }
 
 }
 if (isset($_POST['kategoriduzenle'])) {

	$kategori_id=$_POST['kategori_id'];

	$kategori_seourl=seo($_POST['kategori_ad']);

	
	$ayarkaydet=$db->prepare("UPDATE kategori SET
		kategori_ad=:kategori_ad, 
		kategori_sira=:kategori_sira,
		kategori_seourl=:kategori_seourl,
		kategori_onecikar=:kategori_onecikar,
		kategori_durum=:kategori_durum
		WHERE kategori_id=$kategori_id");

	$update=$ayarkaydet->execute(array(
		'kategori_ad' => $_POST['kategori_ad'],
		'kategori_sira' => $_POST['kategori_sira'],
		'kategori_seourl' => $kategori_seourl,
		'kategori_onecikar' => $_POST['kategori_onecikar'],
		'kategori_durum' => $_POST['kategori_durum']
		));


	if ($update) {

		Header("Location:../production/kategori-duzenle.php?kategori_id=$kategori_id&durum=ok");

	} else {

		Header("Location:../production/kategori-duzenle.php?kategori_id=$kategori_id&durum=no");
	}

}

?>