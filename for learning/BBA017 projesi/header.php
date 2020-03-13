
<?php
  ob_start();
  session_start();
include 'nedmin/netting/baglan.php';
include 'nedmin/production/fonksiyon.php';

$ayarsor=$db->prepare("SELECT*FROM ayar where ayar_id=:id");
$ayarsor->execute(array(
	'id'=>0
));

$ayarcek=$ayarsor->fetch(PDO::FETCH_ASSOC);

//eger sessiondan gelen sey varsa kullanicini ceke biler
if (isset($_SESSION['userkullanici_mail'])){
	
	$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_mail=:mail");
	$kullanicisor->execute(array(
	  'mail' => $_SESSION['userkullanici_mail']
	  ));
	$say=$kullanicisor->rowCount();
	$kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
	if (!isset($_SESSION['userkullanici_id'])) {
		$_SESSION['userkullanici_id']=$kullanicicek['kullanici_id'];
	}
	}

$haqqimizdasor=$db->prepare("select*from hakkimizda where hakkimizda_id=:id");
$haqqimizdasor->execute(array(
    'id'=>0
));
$haqqimizdacek=$haqqimizdasor->fetch(PDO::FETCH_ASSOC);
?>

?>
 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BBA-017 Resmi Sehifesi</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/animate.css">
	<link href="css/prettyPhoto.css" rel="stylesheet">
	<link href="style.css" rel="stylesheet" />	
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <!-- Ck Editör -->
  <!--<script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>-->
  <script src="nedmin/production/ckeditor/ckeditor.js"></script>
  
  </head>
  <body>
	<header>		
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="navigation">
				<div class="container">					
                 
						<div class="navbar-brand">
							<a href="index.php"><h1><span>BBA</span>-017</h1></a>
						</div>
				 
					
					<?php include "linkhisseleriprofilin.php"?>

				 						
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist"> 
								<li role="presentation"><a href="index.php" class="active">Ev</a></li> 
                                <li role="presentation"><a href="haqqimizda.php">Haqqimizda</a></li>
                                <li role="presentation"><a href="service.php">Bacariqlarimiz</a></li>
								<li role="presentation"><a href="unihaqqinda.php">About University</a></li> 
								<li role="presentation"><a href="contact.php">Bizimle Elaqe</a></li> 

								<?php if (isset($_SESSION['userkullanici_mail'])) {?>
								
								<!-- profil start-->
 <li  role="presentation">
     <div class="notify-notification">
         <a href="#"><i class="fa fa-bell-o" aria-hidden="true"></i><span>
         <?php 
             
             $statussay=$db->prepare("SELECT COUNT(status_oxunma) as say from status where status_oxunma=:oxunma 
             and kullanici_id=:kullanici_id ");
             $statussay->execute(array(
                 'oxunma'=>0,
                 'kullanici_id'=>$_SESSION['userkullanici_id']
                 
             ));
             
             $saycek=$statussay->fetch(PDO::FETCH_ASSOC);

             echo $saycek['say'];
             ?> 
         </span></a>


         <ul>

         <?php 
         $statussor=$db->prepare("SELECT status.*,kullanici.* FROM status
         inner join kullanici on status.kullanici_statusyazan=kullanici.kullanici_id
         where status.kullanici_id=:id and status.status_oxunma=:oxunma
         order by status_oxunma,status_zaman DESC limit 5");
        $statussor->execute(array(
       'id' => $_SESSION['userkullanici_id'],
       'oxunma' => 0
    
         ));
    while($statuscek=$statussor->fetch(PDO::FETCH_ASSOC)){  ?>

             <li>
                 <div class="notify-notification-img">
                     <img class="img-responsive" src="<?php echo $statuscek['kullanici_foto']?>" alt="profile">
                 </div>
                 <div class="notify-notification-info">
                     <div class="notify-notification-subject"><?php echo  $statuscek['kullanici_ad']." ".$statuscek['kullanici_soyad']?></div>
                     <div class="notify-notification-date"><?php echo $statuscek['status_zaman']?></div>
                 </div>
                 <div class="notify-notification-sign">
                     <i class="fa fa-bell-o" aria-hidden="true"></i>
                 </div>
             </li>
       
    <?php } ?>

            
         </ul>
     </div>
 </li>
 <li  role="presentation">
     <div class="notify-message">
         <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i><span>
             
             <?php 
             
             $mesajsay=$db->prepare("SELECT COUNT(mesaj_oxunma) as say from mesaj where mesaj_oxunma=:oxunma 
             and kullanici_mesajgelen=:kullanici_mesajgelen  ");
             $mesajsay->execute(array(
                 'oxunma'=>0,
                 'kullanici_mesajgelen'=>$_SESSION['userkullanici_id']
                 
             ));
             
             $saycek=$mesajsay->fetch(PDO::FETCH_ASSOC);

             echo $saycek['say'];
             ?>

             </span></a>

 <ul>
             <?php 
 $mesajsor=$db->prepare("SELECT mesaj.*,kullanici.* FROM mesaj
 inner join kullanici on mesaj.kullanici_mesajgonderen=kullanici.kullanici_id
 where mesaj.kullanici_mesajgelen=:id and mesaj.mesaj_oxunma=:oxunma
 order by mesaj_oxunma,mesaj_zaman DESC limit 5");
 $mesajsor->execute(array(
    'id' => $_SESSION['userkullanici_id'],
    'oxunma' => 0
    
    ));
 
    if ($mesajsor->rowCount()==0) {?>
<li>
<div class="notify-message-img">
<div class="notify-message-subject">Mesaj yoxdur Dostum:)</div>
</div>
</li>   
 <?php } 
while($mesajcek=$mesajsor->fetch(PDO::FETCH_ASSOC)){  ?>
        
             <li>
                 <div class="notify-message-img">
                     <img class="img-responsive" src="<?php echo $mesajcek['kullanici_foto']?>" alt="profile">
                 </div>
                 <div class="notify-message-info">
                     <div class="notify-message-sender"><?php echo  $mesajcek['kullanici_ad']." ".$mesajcek['kullanici_soyad']?></div>
                     <a href="mesaj_detay.php?mesaj_id=<?php echo $mesajcek['mesaj_id']?>&kullanici_mesajgonderen=<?php echo $mesajcek['kullanici_mesajgonderen']?>"><div class="notify-message-subject">Mesaja bax</div></a>
                     <div class="notify-message-date"><?php echo $mesajcek['mesaj_zaman']?> </div>
                 </div>
                 <div class="notify-message-sign">
                     <i class="fa fa-envelope-o" aria-hidden="true"></i>
                 </div>
             </li>
             
   <?php } ?>


         </ul>
     </div>
 </li>
 
 <li  role="presentation">
     <div class="user-account-info">
         <div class="user-account-info-controler">
             <div class="user-account-img">
                 <img style="border-radius:30px;" width="32" height="32" class="img-responsive" src="<?php echo $kullanicicek['kullanici_foto']?>" alt="profile">
             </div>
             <div class="user-account-title">
                 <div class="user-account-name"><?php echo $kullanicicek['kullanici_ad']." ".$kullanicicek['kullanici_soyad']?></div>
                  
             </div>
             <div class="user-account-dropdown">
                 <i class="fa fa-angle-down" aria-hidden="true"></i>
             </div>
         </div>
         <ul>
             <li><a href="hesab_bilgileri">Profil Sehifeniz</a></li>
             <li><a href="islerim.php">Fealiyyet</a></li>

         </ul>
     </div>
 </li>
 
								<!-- profil finish -->
									<div style="float:right">
									<li><a  style="border-radius:50px;" class="apply-now-btn" href="logout.php" id="logout-button">Cixis</a></li>
									</div>
                                <?php } 
                                else
                                
                                {?>
									 	<li>
                                   <div class="apply-btn-area">
                                      <a  style="border-radius:50px;" class="apply-now-btn" href="login.php" id="login-button">Giris</a> 
                                   </div>
                              </li> 
                                 <li>
                                     <div class="apply-btn-area">
                                        <a  style="border-radius:50px;" class="apply-now-btn-color hidden-on-mobile" href="register.php">Qeydiyyat</a> 
                                     </div>
					             </li>
							<?php } ?>
							
							</ul> 	
						<p></p>	</div>
				 
							
				</div>
			 	</nav>	
			
	</header>
	<!-- header finish -->