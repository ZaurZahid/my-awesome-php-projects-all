 

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
                 
                    
                      <div class="navbar-brand">
                          <a href="index.php"><h1><span>BBA</span>-017</h1></a>
                      </div>
                  
                  
                  <?php include "linkhisseleriprofilin.php"?>

                  <div class="navbar-collapse collapse">							
                      
                          <ul class="nav nav-tabs" role="tablist">
                              <li role="presentation"><a href="index.php" class="active">Ev</a></li>
                              <li role="presentation"><a href="login.php">Giris</a></li>
                              <li role="presentation"><a href="register.php">Qeydiyyat</a></li>
                              <li role="presentation"><a href="haqqimizda.php">Haqqimizda</a></li>
                              <li role="presentation"><a href="portfolio.html">Portfolio</a></li>
                              <li role="presentation"><a href="blog.html">Blog</a></li>
                              <li role="presentation"><a hSref="contact.html">Bizimle Elaqe</a></li> 
                               

                <li role="presentation">
                <div class="notify-notification">
         <a href="#"><i class="fa fa-bell-o" aria-hidden="true"></i><span>8</span></a>
         <ul>
             <li>
                 <div class="notify-notification-img">
                     <img class="img-responsive" src="sekil\profile\1.png" alt="profile">
                 </div>
                 <div class="notify-notification-info">
                     <div class="notify-notification-subject">Need WP Help!</div>
                     <div class="notify-notification-date">01 Dec, 2016</div>
                 </div>
                 <div class="notify-notification-sign">
                     <i class="fa fa-bell-o" aria-hidden="true"></i>
                 </div>
             </li>
              
            
         </ul>
     </div>
 </li>
 <li role="presentation">
     <div class="notify-message">
         <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i><span>
         <?php 
             
             $mesajsay=$db->prepare("SELECT COUNT(mesaj_oxunma) as say from mesaj where mesaj_oxunma=:oxunma");
             $mesajsay->execute(array(
                 'oxunma'=>0
             ));
             
             $saycek=$mesajsay->fetch(PDO::FETCH_ASSOC);

             echo $saycek['say'];
             ?>
        
        
        </span></a>
         <ul>
             <li>
                 <div class="notify-message-img">
                     <img class="img-responsive" src="sekil\profile\1.png" alt="profile">
                 </div>
                 <div class="notify-message-info">
                     <div class="notify-message-sender">Kazi Fahim</div>
                     <div class="notify-message-subject">Need WP Help!</div>
                     <div class="notify-message-date">01 Dec, 2016</div>
                 </div>
                 <div class="notify-message-sign">
                     <i class="fa fa-envelope-o" aria-hidden="true"></i>
                 </div>
             </li>
             
             
         </ul>
     </div>
 </li>
   
 <li role="presentation">
     <div class="user-account-info">
         <div class="user-account-info-controler">
             <div class="user-account-img">
                 <img class="img-responsive" src="sekil\profile\4.png" alt="profile">
             </div>
             <div class="user-account-title">
                 <div class="user-account-name">Mike Hussy</div>
                 <div class="user-account-balance">$171.00</div>
             </div>
             <div class="user-account-dropdown">
                 <i class="fa fa-angle-down" aria-hidden="true"></i>
             </div>
         </div>
         <ul>
             <li><a href="#">Profile Page</a></li>
              
         </ul>
     </div>
 </li>

 <div>
 <li><a class="apply-now-btn" href="index.htm" id="logout-button">Logout</a></li>
 </div>	
                          </ul> 
                   
                  </div>		
                              
              </div>
               
      </nav>		
  </header>
  <!-- header finish -->