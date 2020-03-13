
 
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
 
	<?php include "linkhisseleriprofilin.php"?>
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
	<link href="css/style.css" rel="stylesheet" />	
	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
	<header>		
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="navigation">
				<div class="container">					
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse.collapse">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="navbar-brand">
							<a href="index.php"><h1><span>BBA</span>-017</h1></a>
						</div>
					</div>
					
					<div class="navbar-collapse collapse">							
						<div class="menu">
							<ul class="nav nav-tabs" role="tablist">
								<li role="presentation"><a href="index.php" class="active">Ev</a></li>
								<li role="presentation"><a href="login.php">Giris</a></li>
								<li role="presentation"><a href="register.php">Qeydiyyat</a></li>
								<li role="presentation"><a href="haqqimizda.php">Haqqimizda</a></li>
								<li role="presentation"><a href="portfolio.html">Portfolio</a></li>
								<li role="presentation"><a href="blog.html">Blog</a></li>
								<li role="presentation"><a href="contact.html">Bizimle Elaqe</a></li>	

							    <li>
                                   <div class="apply-btn-area">
                                      <a  style="border-radius:50px;"class="apply-now-btn" href="#" id="login-button">Login</a> 
                                   </div>
                              </li> 
                                 <li>
                                     <div class="apply-btn-area">
                                        <a class="apply-now-btn-color hidden-on-mobile" href="registration.htm">Register</a> 
                                     </div>
					             </li>
                          </ul>
					</div>						
				</div>
			</div>	
		</nav>		
	</header>
	<!-- header finish -->
        