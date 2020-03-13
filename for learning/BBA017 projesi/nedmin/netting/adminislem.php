 <?php
 
require_once 'baglan.php';
include '../production/fonksiyon.php';

if (isset($_POST['logoduzenle'])) {
    
       
       if ($_FILES['ayar_logo']['size']>1048576) {
           
           echo "Bu dosya boyutu çok büyük";
   
           Header("Location:../production/genel-ayar.php?durum=dosyabuyuk");
   
       }
   
   
       $izinli_uzantilar=array('jpg','png');
   
       //echo $_FILES['ayar_logo']["name"];
   
       $ext=strtolower(substr($_FILES['ayar_logo']["name"],strpos($_FILES['ayar_logo']["name"],'.')+1));
   
       if (in_array($ext, $izinli_uzantilar) === false) {
           echo "Bu uzantı kabul edilmiyor";
           Header("Location:../production/genel-ayar.php?durum=formathata");
   
           exit;
       }
   
   
       $uploads_dir = '../../dimg';
   
       @$tmp_name = $_FILES['ayar_logo']["tmp_name"];
       @$name = $_FILES['ayar_logo']["name"];
   
       $benzersizsayi4=rand(20000,32000);
       $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;
   
       @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
   
       
       $duzenle=$db->prepare("UPDATE ayar SET
           ayar_logo=:logo
           WHERE ayar_id=0");
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
   
 
   if (isset($_POST['adminkullaniciduzenle'])) {
    
    
        $kullanici_id=$_POST['kullanici_id'];
    
    
           $kullaniciguncelle=$db->prepare("UPDATE kullanici SET
               
                       kullanici_ad=:kullanici_ad,
                       kullanici_soyad=:kullanici_soyad,
                       kullanici_tel=:kullanici_tel,
                       kullanici_adress=:kullanici_adress,
                       kullanici_seher=:kullanici_seher,
                       kullanici_olke=:kullanici_olke,
                       kullanici_durum=:kullanici_durum 
    
                       WHERE kullanici_id={$_POST['kullanici_id']} ");
               
                        $update=$kullaniciguncelle->execute(array(
                                //hansilar sabit qalir adminde onlari yazmaq lazim deyil
                        'kullanici_ad'=>htmlspecialchars($_POST['kullanici_ad']),
                        'kullanici_soyad'=>htmlspecialchars($_POST['kullanici_soyad']),
                        'kullanici_tel'=>htmlspecialchars($_POST['kullanici_tel']),
                        'kullanici_adress'=>htmlspecialchars($_POST['kullanici_adress']), 			
                        'kullanici_seher'=>htmlspecialchars($_POST['kullanici_seher']),
                        'kullanici_olke'=>htmlspecialchars($_POST['kullanici_olke']),
                        'kullanici_durum'=>htmlspecialchars($_POST['kullanici_durum']) 
                        
                        
                    ));
                   if ($update) {
                   Header("Location:../production/kullanici-duzenle.php?durum=ok&kullanici_id=$kullanici_id");
               
                   } else {
                   Header("Location:../production/kullanici-duzenle.php?durum=hata&kullanici_id=$kullanici_id");
                   }
                
           }
 
 
 
if (isset($_POST['statusekle'])) {
    
       
       if ($_FILES['status_sekil']['size']>1048576) {
           
           echo "Bu dosya boyutu çok büyük";
   
           Header("Location:../../status_ekle?durum=dosyabuyuk");
   
       }
   
   
       $izinli_uzantilar=array('jpg','png');
   
       //echo $_FILES['ayar_logo']["name"];
   
       $ext=strtolower(substr($_FILES['status_sekil']["name"],strpos($_FILES['status_sekil']["name"],'.')+1));
   
       if (in_array($ext, $izinli_uzantilar) === false) {
           echo "Bu uzantı kabul edilmiyor";
           Header("Location:../../status_ekle?durum=formathata");
   
           exit;
       }
   
   
       $uploads_dir = '../../dimg/statussekili';
   
       @$tmp_name = $_FILES['status_sekil']["tmp_name"];
       @$name = $_FILES['status_sekil']["name"];
   
       $benzersizsayi4=rand(20000,32000);
       $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;
   
       @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
   


       $status_detay=($_POST['status_detay']); 
       $ekle=$db->prepare("INSERT INTO status SET
       
            kullanici_id=:kullanici_id,
            kullanici_statusyazan=:kullanici_statusyazan,
            status_sekil=:status_sekil,
            status_detay=:status_detay
           ");
       $kaydet=$ekle->execute(array(
           'kullanici_id' =>  $_SESSION['userkullanici_id'],                          
           'kullanici_statusyazan' =>  $_SESSION['userkullanici_id'],                  
           'status_sekil' => $refimgyol,
           'status_detay' =>  $status_detay
           
       ));
   
   
   
       if ($kaydet) {
    
   

           Header("Location:../../status_ekle?durum=ok");
   
       } else {
   
           Header("Location:../../status_ekle?durum=no");
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
	 
		Header("Location:../../statuslarim.php?durum=ok");

	} else {

		Header("Location:../../statuslarim.php?durum=hata");
	}

}
 
 
 
if (isset($_POST['statusduzelt'])) {
    
       
       if ($_FILES['status_sekil']['size']>1048576) {
           
           echo "Bu dosya boyutu çok büyük";
   
           Header("Location:../production/status_duzelt?durum=dosyabuyuk");
   
       }
   
   
       $izinli_uzantilar=array('jpg','png');
   
       //echo $_FILES['ayar_logo']["name"];
   
       $ext=strtolower(substr($_FILES['status_sekil']["name"],strpos($_FILES['status_sekil']["name"],'.')+1));
   
       if (in_array($ext, $izinli_uzantilar) === false) {
           echo "Bu uzantı kabul edilmiyor";
           Header("Location:../production/status_duzelt?durum=formathata");
   
           exit;
       }
   
   
       $uploads_dir = '../../dimg/statussekili';
   
       @$tmp_name = $_FILES['status_sekil']["tmp_name"];
       @$name = $_FILES['status_sekil']["name"];
   
       $benzersizsayi4=rand(20000,32000);
       $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;
   
       @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
   


       $status_detay=($_POST['status_detay']); 
       $duzelt=$db->prepare("UPDATE status SET 
           status_sekil=:status_sekil,
           status_detay=:status_detay
           WHERE status_id={$_POST['status_id']}");
       $kaydet=$duzelt->execute(array(        
           'status_sekil' => $refimgyol,
           'status_detay' =>  $status_detay
           
       ));
   
   
  $status_id=$_POST['status_id'];
       if ($kaydet) {
    
        $resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");
           Header("Location:../../statuslarim?durum=ok&status_id=$status_id");
   
       } else {
   
           Header("Location:../../statuslarim?durum=no&status_id=$status_id");
       }
   
   }
   
 
  
if (isset($_POST['xeberekle'])) {
    
       
       if ($_FILES['xeber_sekil']['size']>1048576) {
           
           echo "Bu dosya boyutu çok büyük";
   
           Header("Location:../../xeber-ekle?durum=dosyabuyuk");
   
       }
   
   
       $izinli_uzantilar=array('jpg','png');
   
       //echo $_FILES['ayar_logo']["name"];
   
       $ext=strtolower(substr($_FILES['xeber_sekil']["name"],strpos($_FILES['xeber_sekil']["name"],'.')+1));
   
       if (in_array($ext, $izinli_uzantilar) === false) {
           echo "Bu uzantı kabul edilmiyor";
           Header("Location:../../xeber-ekle?durum=formathata");
   
           exit;
       }
   
   
       $uploads_dir = '../../dimg/xebersekili';
   
       @$tmp_name = $_FILES['xeber_sekil']["tmp_name"];
       @$name = $_FILES['xeber_sekil']["name"];
   
       $benzersizsayi4=rand(20000,32000);
       $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;
   
       @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
   


       $xeber_detay=$_POST['xeber_detay']; 
       $ekle=$db->prepare("INSERT INTO xeber SET
           kullanici_id=:kullanici_id,
           xeber_sekil=:xeber_sekil,
           xeber_detay=:xeber_detay
           ");
       $kaydet=$ekle->execute(array(
           'kullanici_id' =>  $_SESSION['userkullanici_id'],       
           'xeber_sekil' => $refimgyol,
           'xeber_detay' =>  $xeber_detay
           
       ));
   
   
   
       if ($kaydet) {
    
   
           Header("Location:../../xeber-ekle?durum=ok");
   
       } else {
   
           Header("Location:../../xeber-ekle?durum=no");
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
	 
		Header("Location:../../xeberler.php?durum=ok");

	} else {

		Header("Location:../../xeberler.php?durum=hata");
	}

}
 
 
 
if (isset($_POST['xeberduzelt'])) {
    
       
       if ($_FILES['xeber_sekil']['size']>1048576) {
           
           echo "Bu dosya boyutu çok büyük";
   
           Header("Location:../../xeber_duzelt?durum=dosyabuyuk");
   
       }
   
   
       $izinli_uzantilar=array('jpg','png');
   
       //echo $_FILES['ayar_logo']["name"];
   
       $ext=strtolower(substr($_FILES['xeber_sekil']["name"],strpos($_FILES['xeber_sekil']["name"],'.')+1));
   
       if (in_array($ext, $izinli_uzantilar) === false) {
           echo "Bu uzantı kabul edilmiyor";
           Header("Location:../../xeber_duzelt?durum=formathata");
   
           exit;
       }
   
   
       $uploads_dir = '../../dimg/xebersekili';
   
       @$tmp_name = $_FILES['xeber_sekil']["tmp_name"];
       @$name = $_FILES['xeber_sekil']["name"];
   
       $benzersizsayi4=rand(20000,32000);
       $refimgyol=substr($uploads_dir, 6)."/".$benzersizsayi4.$name;
   
       @move_uploaded_file($tmp_name, "$uploads_dir/$benzersizsayi4$name");
   


       $xeber_detay=($_POST['xeber_detay']); 
       $duzelt=$db->prepare("UPDATE xeber SET 
           xeber_sekil=:xeber_sekil,
           xeber_detay=:xeber_detay
           WHERE xeber_id={$_POST['xeber_id']}");
       $kaydet=$duzelt->execute(array(        
           'xeber_sekil' => $refimgyol,
           'xeber_detay' =>  $xeber_detay
           
       ));
   
   
  $xeber_id=$_POST['xeber_id'];
       if ($kaydet) {
    
        $resimsilunlink=$_POST['eski_yol'];
		unlink("../../$resimsilunlink");
           Header("Location:../../xeberler?durum=ok&xeber_id=$xeber_id");
   
       } else {
   
           Header("Location:../../xeberler?durum=no&xeber_id=$xeber_id");
       }
   
   }
   
 
 
 ?>