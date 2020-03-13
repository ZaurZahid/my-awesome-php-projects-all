<?php
  
include 'baglan.php';
include '../production/fonksiyon.php';


if (isset($_POST['admingiris'])) {

	$kullanici_mail=$_POST['kullanici_mail'];
	$kullanici_password=md5($_POST['kullanici_password']);

	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail and kullanici_password=:password and kullanici_yetki=:yetki");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail,
		'password' => $kullanici_password,
		'yetki' => 1
		));

	echo $say=$kullanicisor->rowCount();

	if ($say==1) {

		$_SESSION['kullanici_mail']=$kullanici_mail;
		header("Location:../production/index.php");
		exit;



	} else {

		header("Location:../production/login.php?durum=no");
		exit;
	}
	

}

if(isset($_POST['genelayarkaydet'])){
 $ayarkaydet=$db->prepare("UPDATE ayar set
 ayar_title=:ayar_title,
 ayar_description=:ayar_description,
 ayar_keywords=:ayar_keywords,
 ayar_author=:ayar_author 
 
  where ayar_id=0");
$update=$ayarkaydet->execute(array(
	'ayar_title'=>$_POST['ayar_title'], 
	'ayar_description'=>$_POST['ayar_description'],
	'ayar_keywords'=>$_POST['ayar_keywords'],
	'ayar_author'=>$_POST['ayar_author']
	 
));
if ($update) {
	header("Location:../production/genel-ayar.php?durum=ok");
} else {
	header("Location:../production/genel-ayar.php?durum=no");
}
}


if(isset($_POST['bilgiduzelt'])){

$bilgiduzelt=$db->prepare("UPDATE ayar set
ayar_tel=:telefon,
ayar_faks=:faks,
ayar_mail=:mail,
ayar_seher=:seher,
ayar_adress=:adress
where ayar_id=0 ");

$update=$bilgiduzelt->execute(array(
'telefon'=>$_POST['ayar_tel'],
'faks'=>$_POST['ayar_faks'],
'mail'=>$_POST['ayar_mail'],
'seher'=>$_POST['ayar_seher'],
'adress'=>$_POST['ayar_adress']
));
if ($update) {
	header("Location:../production/bizimle-elaqe.php?durum=ok");
	
} else {
	header("Location:../production/bizimle-elaqe.php?durum=no");
}
}


if(isset($_POST['sosialduzelt'])){
	
	$bilgiduzelt=$db->prepare("UPDATE ayar set
	ayar_facebook=:ayar_facebook,
	ayar_twitter=:ayar_twitter,
	ayar_google=:ayar_google 
	where ayar_id=0 ");
	
	$update=$bilgiduzelt->execute(array(
	'ayar_facebook'=>$_POST['ayar_facebook'],
	'ayar_twitter'=>$_POST['ayar_twitter'],
	'ayar_google'=>$_POST['ayar_google']
	));
	if ($update) {
		header("Location:../production/sosial.php?durum=ok");
		
	} else {
		header("Location:../production/sosial.php?durum=no");
	}
	}

	if(isset($_POST['haqqimizdaguncelle'])){
		
		$haqqimizdaduzelt=$db->prepare("UPDATE hakkimizda set
		hakkimizda_baslik=:baslik,
		hakkimizda_detay=:detay,
		hakkimizda_video=:video 
		where hakkimizda_id=0 ");
		
		$update=$haqqimizdaduzelt->execute(array(
		'baslik'=>$_POST['haqqimizda_basliq'],
		'detay'=>$_POST['haqqimizda_detay'],
		'video'=>$_POST['haqqimizda_video']
		));
		if ($update) {
			header("Location:../production/haqqimizda.php?durum=ok");
			
		} else {
			header("Location:../production/haqqimizda.php?durum=no");
		}
		}
	/* ---------------------------------------------------------------------------------------- */

		if (isset($_POST['unikaydet'])) {
			
			   
			   if ($_FILES['uni_sekil']['size']>1048576) {
				   
				   echo "Bu dosya boyutu çok büyük";
		   
				   Header("Location:../production/uni_ekle?durum=dosyabuyuk");
		   
			   }
		   
		   
			   $izinli_uzantilar=array('jpg','png');
		   
			   //echo $_FILES['ayar_logo']["name"];
		   
			   $ext=strtolower(substr($_FILES['uni_sekil']["name"],strpos($_FILES['uni_sekil']["name"],'.')+1));
		   
			   if (in_array($ext, $izinli_uzantilar) === false) {
				   echo "Bu uzantı kabul edilmiyor";
				   Header("Location:../production/uni_ekle?durum=formathata");
		   
				   exit;
			   }
		   
		   
			   $uploads_dir = '../../dimg/unisekili';
		   
			   @$tmp_name = $_FILES['uni_sekil']["tmp_name"];
			   @$name = $_FILES['uni_sekil']["name"];
		   
			   $benzersizsayi4=rand(20000,32000);
			   $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;
		   
			   @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
		   
		
		 
			   $ekle=$db->prepare("INSERT INTO uni SET
				
					uni_detay=:uni_detay,
					uni_basliq=:uni_basliq,
					uni_sekil=:uni_sekil
					
				   ");
			   $kaydet=$ekle->execute(array(                      
				   'uni_detay' =>  $_POST['uni_detay'], 
				   'uni_basliq' =>  $_POST['uni_basliq'],
				   'uni_sekil' => $refimgyol
			   ));
		   
		
		   
			   if ($kaydet) {
			
		   
		
				   Header("Location:../production/uni_ekle?durum=ok");
		   
			   } else {
		   
				   Header("Location:../production/uni_ekle?durum=no");
			   }
		   
		   }

/* ----------------------------------------------------------------------- */
 
 
if (isset($_POST['uniduzelt'])) {
    
       
       if ($_FILES['uni_sekil']['size']>1048576) {
           
           echo "Bu dosya boyutu çok büyük";
   
           Header("Location:../production/uni_duzelt?durum=dosyabuyuk");
   
       }
   
   
       $izinli_uzantilar=array('jpg','png');
   
     
   
       $ext=strtolower(substr($_FILES['uni_sekil']["name"],strpos($_FILES['uni_sekil']["name"],'.')+1));
   
       if (in_array($ext, $izinli_uzantilar) === false) {
           echo "Bu uzantı kabul edilmiyor";
           Header("Location:../production/uni_duzelt?durum=formathata");
   
           exit;
       }
   
   
       $uploads_dir = '../../dimg/unisekili';
   
       @$tmp_name = $_FILES['uni_sekil']["tmp_name"];
       @$name = $_FILES['uni_sekil']["name"];
   
       $benzersizsayi4=rand(20000,32000);
       $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;
   
       @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name"); 
       $duzelt=$db->prepare("UPDATE uni SET 

           uni_detay=:uni_detay,
		   uni_basliq=:uni_basliq,
		   uni_sekil=:uni_sekil

           WHERE uni_id={$_POST['uni_id']}");
       $kaydet=$duzelt->execute(array(       

		'uni_detay' =>  $_POST['uni_detay'], 
		'uni_basliq' =>  $_POST['uni_basliq'],
		'uni_sekil' => $refimgyol
           
       ));
   
   
  $uni_id=$_POST['uni_id'];
       if ($kaydet) {
    
        $resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink"); 
           Header("Location:../production/uni.php?durum=ok&uni_id=$uni_id");
   
       } else {
   
           Header("Location::../production/uni.php?durum=no&uni_id=$uni_id");
       }
   
   }


   if ($_GET['unisil']=="ok") {
	
	$sil=$db->prepare("DELETE from uni where uni_id=:uni_id");
	$kontrol=$sil->execute(array(
		'uni_id' => $_GET['uni_id']
		));

	if ($kontrol) {
  
		$resimsilunlink=$_GET['uni_sekil'];
		unlink("../../$resimsilunlink");
	 
		Header("Location:../production/uni.php?durum=ok");

	} else {

		Header("Location:../production/uni.php?durum=hata");
	}

}
 

if (isset($_POST['statusduzelt'])) {
    
       
       if ($_FILES['status_sekil']['size']>1048576) {
           
           echo "Bu dosya boyutu çok büyük";
   
           Header("Location:../production/status-duzelt?durum=dosyabuyuk");
   
       }
   
   
       $izinli_uzantilar=array('jpg','png');
   
     
   
       $ext=strtolower(substr($_FILES['status_sekil']["name"],strpos($_FILES['status_sekil']["name"],'.')+1));
   
       if (in_array($ext, $izinli_uzantilar) === false) {
           echo "Bu uzantı kabul edilmiyor";
           Header("Location:../production/status-duzelt?durum=formathata");
   
           exit;
       }
   
   
       $uploads_dir = '../../dimg/statussekili';
   
       @$tmp_name = $_FILES['status_sekil']["tmp_name"];
       @$name = $_FILES['status_sekil']["name"];
   
       $benzersizsayi4=rand(20000,32000);
       $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;
   
       @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name"); 
       $duzelt=$db->prepare("UPDATE status SET 

           status_detay=:status_detay, 
		   status_sekil=:status_sekil

           WHERE status_id={$_POST['status_id']}");
       $kaydet=$duzelt->execute(array(       

		'status_detay' =>  $_POST['status_detay'], 
		'status_sekil' => $refimgyol
           
       ));
   
   
  $status_id=$_POST['status_id'];
       if ($kaydet) {
    
        $resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink"); 
           Header("Location:../production/status.php?durum=ok&status_id=$status_id");
   
       } else {
   
           Header("Location::../production/status.php?durum=no&status_id=$status_id");
       }
   
   }


   if ($_GET['statussil']=="ok") {
	
	$sil=$db->prepare("DELETE from status where status_id=:status_id");
	$kontrol=$sil->execute(array(
		'status_id' => $_GET['status_id']
		));

	if ($kontrol) {
  
		$resimsilunlink=$_GET['status_sekil'];
		unlink("../../$resimsilunlink");
	 
		Header("Location:../production/status.php?durum=ok");

	} else {

		Header("Location:../production/status.php?durum=hata");
	}

}
 

if (isset($_POST['xeberduzelt'])) {
    
       
       if ($_FILES['xeber_sekil']['size']>1048576) {
           
           echo "Bu dosya boyutu çok büyük";
   
           Header("Location:../production/xeber-duzelt?durum=dosyabuyuk");
   
       }
   
   
       $izinli_uzantilar=array('jpg','png');
   
     
   
       $ext=strtolower(substr($_FILES['xeber_sekil']["name"],strpos($_FILES['xeber_sekil']["name"],'.')+1));
   
       if (in_array($ext, $izinli_uzantilar) === false) {
           echo "Bu uzantı kabul edilmiyor";
           Header("Location:../production/xeber-duzelt?durum=formathata");
   
           exit;
       }
   
   
       $uploads_dir = '../../dimg/xebersekili';
   
       @$tmp_name = $_FILES['xeber_sekil']["tmp_name"];
       @$name = $_FILES['xeber_sekil']["name"];
   
       $benzersizsayi4=rand(20000,32000);
       $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;
   
       @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name"); 
       $duzelt=$db->prepare("UPDATE xeber SET 
           xeber_detay=:xeber_detay, 
           xeber_sekil=:xeber_sekil 
		  

           WHERE xeber_id={$_POST['xeber_id']}");
       $kaydet=$duzelt->execute(array(       
		'xeber_detay' =>  $_POST['xeber_detay'], 
		'xeber_sekil' => $refimgyol 
		
           
       ));
   
   
  $xeber_id=$_POST['xeber_id'];
       if ($kaydet) {
    
        $resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink"); 
           Header("Location:../production/xeber.php?durum=ok&xeber_id=$xeber_id");
   
       } else {
   
           Header("Location::../production/xeber.php?durum=no&xeber_id=$xeber_id");
       }
   
   }

   if ($_GET['xebersil']=="ok") {
	
	$sil=$db->prepare("DELETE from xeber where xeber_id=:xeber_id");
	$kontrol=$sil->execute(array(
		'xeber_id' => $_GET['xeber_id']
		));

	if ($kontrol) {
  
		$resimsilunlink=$_GET['xeber_sekil'];
		unlink("../../$resimsilunlink");
	 
		Header("Location:../production/xeber.php?durum=ok");

	} else {

		Header("Location:../production/xeber.php?durum=hata");
	}

}
 
if ($_GET['kullanicisil']=="ok") {
	islemkontrol();
	$sil=$db->prepare("DELETE from kullanici where kullanici_id=:kullanici_id");
	$kontrol=$sil->execute(array(
		'kullanici_id' => $_GET['kullanici_id']
		));

	if ($kontrol) {
   
		Header("Location:../production/kullanici.php?durum=ok");

	} else {

		Header("Location:../production/kullanici.php?durum=hata");
	}

}
?>