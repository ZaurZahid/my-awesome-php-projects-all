<?php
  ob_start();
  session_start();
require_once "../netting/baglan.php";
 
$ayarsor=$db->prepare("select*from ayar where ayar_id=:id");
$ayarsor->execute(array(
    'id'=>0
));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id");
$kullanicisor->execute(array(
  'id' =>0
  ));
 $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
 
 $kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
 $kullanicisor->execute(array(
   'mail' => $_SESSION['kullanici_mail']
   ));
 $say=$kullanicisor->rowCount();
 $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
 
 if ($say==0) {
    Header("Location:login.php?durum=izinsiz");
    exit;
  
  }
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="images/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="images/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin paneli</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="css/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="css/themify-icons.css" rel="stylesheet">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- Ck Editör --> 
  <!--<script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>-->
  <script src="ckeditor/ckeditor.js"></script>
  


</head>
<body>

<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    BBA-017 
                </a>
            </div>

            <ul class="nav">
            <li class="active">
                    <a href="index.php">
                        <i class="fa fa-home"></i>
                        <p>Anasehife</p>
                    </a>
                </li>
                <li><a href="" ><i class="fa fa-cogs"></i> Site Ayarları  </a>
                 <ul class="nav child_menu">
                    <li><a href="genel-ayar.php">Genel Ayarlar</a></li>
                    <li><a href="bizimle-elaqe.php">Bizimle Elaqe</a></li>
                    <li><a href="sosial.php">Sosial Elaqeler</a></li>
                  </ul>
                <li>
                    <a href="haqqimizda.php">
                        <i class="fa fa-info"></i>
                        <p>Haqqimizda</p>
                    </a>
                </li>
                <li>
                    <a href="kullanici.php">
                        <i class="ti-user"></i>
                        <p>Isdifadeciler</p>
                    </a>
                </li>
                <li>
                    <a href="mesaj.php">
                        <i class="fa fa-envelope"></i>
                        <p>Mesajlar</p>
                    </a>
                </li>
                 <li>
                    <a href="status.php">
                        <i class="fa fa-comment"></i>
                        <p>Statuslar</p>
                    </a>
                </li>
                <li>
                    <a href="xeber.php">
                        <i class="fa fa-newspaper-o"></i>
                        <p>Xeberler</p>
                    </a>
                </li>
                <li>
                    <a href="uni.php">
                        <i class="fa fa-university"></i>
                        <p>Universitet</p>
                    </a>
                </li>
              
             
              
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Isdifadeci profili</a>
                </div>
                <div class="collapse navbar-collapse"> 
                </div>
            </div>
        </nav>

