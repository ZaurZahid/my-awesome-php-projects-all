<?php
ob_start();
session_start();
date_default_timezone_set('Asia/Baku');

require_once 'baglan.php';
require_once '../production/fonksiyon.php';

if (isset($_POST['sifremiunuttum'])) {
	
	$kullanici_mail=$_POST['kullanici_mail'];

	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
	$kullanicisor->execute(array(
		'mail' => $kullanici_mail
	));
	$say=$kullanicisor->rowCount();


	if ($say==0) {
		
		Header("Location:../../login");
		exit;

	} else {

		$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);

     	 $yenisifre=md5($_GET['x']);
		//Veritabanı kaydını yap

		$sifreguncelle=$db->prepare("UPDATE kullanici SET


			kullanici_password=:kullanici_password

			WHERE kullanici_mail='$kullanici_mail'");


		$update=$sifreguncelle->execute(array(


			'kullanici_password' => $yenisifre

		));


		//Varitabanı kaydı bitir
		

	}
}




?>