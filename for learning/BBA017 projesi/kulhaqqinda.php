<?php require_once "header.php";
islemkontrol ();
?>
<?php 
			$kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:id ");
            $kullanicisor->execute(array(
                'id'=>$_GET['kullanici_id']
            ));
            $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
            ?>
 
	<div class="aboutus">
		<div class="container">   <p> </p>
			<h3 style="color:orange;"><?php echo $kullanicicek['kullanici_ad']." ".$kullanicicek['kullanici_soyad']?>-adli istifadecinin haqqinda sehifesi</h3>
			<hr>
			<div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">

			<div class="title-bg">
			<h1 style="color:green;" class="title">Kullanicinin sekili</h1>
        </div>
        
        
				 <p><?php echo $kullanicicek['kullanici_seher']." ".$kullanicicek['kullanici_olke']." ".$kullanicicek['kullanici_tel']?>	</p>	         
				 <?php  if (empty($_SESSION['userkullanici_id'])) {?>
					<p>	 <a href="login.php"   class="btn btn-success"> <i class="fa fa-envelope-o" aria-hidden="true"></i> Mesaj Gonder</a> </p> 
					
				  <?php }     else if ($_SESSION['userkullanici_id']==$_GET['kullanici_id']) {?>
					<p>	 <button disabled="" class="btn btn-danger"> <i class="fa fa-ban" aria-hidden="true"></i> Mesaj Gonder</button> </p> 
				<?php }  else {?>
					<p>	 <a href="mesaj_gonder?kullanici_mesajgelen=<?php echo $_GET['kullanici_id']?>"   class="btn btn-success"> <i class="fa fa-envelope-o" aria-hidden="true"></i> Mesaj Gonder</a> </p> 
					<?php  }?>
			<img width="400" src="<?php echo $kullanicicek['kullanici_foto']?>" alt="">
		
			
		</div>
			 
				 			
			</div>
		</div>
	</div>
	
 
	
	<?php require_once "footer.php"?>
	