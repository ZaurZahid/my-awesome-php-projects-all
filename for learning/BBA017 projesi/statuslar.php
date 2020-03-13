<?php require_once "header.php";
 islemkontrol ();
 ?>
<?php 
			$statussor=$db->prepare("SELECT * FROM status where status_id=:id ");
            $statussor->execute(array(
                'id'=>$_GET['status_id']
            ));
            $statuscek=$statussor->fetch(PDO::FETCH_ASSOC);
            ?>
 
	<div class="aboutus">
		<div class="container">   <p> </p>
			<h3 style="color:orange;"><?php echo $kullanicicek['kullanici_ad']." ".$kullanicicek['kullanici_soyad']?>-adli istifadecinin statusu</h3>
			<hr>
			<div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">

			<div class="title-bg">
			<h1 style="color:green;" class="title">Statusun sekili</h1>
        </div>
        
        <img width="400" src="<?php echo $statuscek['status_sekil']?>" alt="">
 				<p><?php echo $statuscek['status_detay']?></p>
			</div>
			 
				 			
			</div>
		</div>
	</div>
	
 
	
	<?php require_once "footer.php"?>
	