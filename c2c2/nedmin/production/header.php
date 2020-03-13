<?php

ob_start();
session_start();
require_once "../netting/baglan.php";

$ayarsor=$db->prepare("SELECT * from ayar where ayar_id=:id");
$ayarsor->execute(array('id'=>1  ));
$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);


$kullanicisor=$db->prepare("SELECT * from kullanici where kullanici_mail=:mail");
$kullanicisor->execute(array(
  'mail' => $_SESSION['kullanici_mail'] 
 ));

$say=$kullanicisor->rowCount();

$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
//linki copy elesem ve operada indexe girsem zibili cixir bu avtamatik atir onu
if($say==0){
  header("location:login.php?durum=izinsiz");
  exit;
}


?>


 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>DataTables | Gentelella</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- Datatables -->
    <link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
    <script src="//cdn.ckeditor.com/4.11.3/standard/ckeditor.js"></script>
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <script src="../vendors/dropzone/dist/min/dropzone.min.js"></script>

    <link href="../vendors/dropzone/dist/min/dropzone.min.css" rel="stylesheet">


  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $kullanicicek["kullanici_adsoyad"]?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Ev </a> 
                  <li><a href="hakkimizda.php"><i class="fa fa-info"></i> Hakkimizda </a> 
                  <li><a href="magaza-onay.php"><i class="fa fa-user"></i> Magaza Basvurulari </a>    
                  <li><a href="magazalar.php"><i class="fa fa-shopping-basket"></i> Magazalar </a>  
                  <li><a href="kullanici.php"><i class="fa fa-user"></i> Kullanicilar </a> 
                  <li><a href="menu.php"><i class="fa fa-list"></i> Menular </a> 
                  <li><a href="urun.php"><i class="fa fa-shopping-basket"></i> Urunlar </a> 
                  <li><a href="kategori.php"><i class="fa fa-list"></i> KAtegoriler </a> 
                  <li><a href="banka.php"><i class="fa fa-bank"></i> Bankalar </a>  
                  <li><a href="slider.php"><i class="fa fa-image"></i> Slider </a> 
                  <li><a href="yorum.php"><i class="fa fa-comments"></i> Yorumlar </a> 


                  </li>



                  <li><a><i class="fa fa-edit"></i> Forms <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="genel-ayar.php">Genel Ayarlar</a></li>
                    <li><a href="iletisim-ayarlar.php">İletişim Ayarlar</a></li>
                    <li><a href="api-ayarlar.php">Api Ayarlar</a></li>
                    <li><a href="#">Sosyal Ayarlar</a></li>
                    <!--

                    Facebook
                    Twitter
                    Youtube
                    Google


                    -->
                    <li><a href="#">Mail Ayarlar</a></li>

                     <!--

                   Smtp Host
                   Smtp User
                   Smtp Password
                   Smtp Port


                     -->  
               </ul>
                  </li>
                   </ul>
              </div>

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>
