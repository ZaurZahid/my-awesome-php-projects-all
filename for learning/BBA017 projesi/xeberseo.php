<?php require_once "header.php"?>
<?php 
			$xebersor=$db->prepare("SELECT * FROM xeber where xeber_id=:id ");
            $xebersor->execute(array(
                'id'=>$_GET['xeber_id']
            ));
            $xebercek=$xebersor->fetch(PDO::FETCH_ASSOC);
            ?>
 
	<div class="aboutus">
		<div class="container">   <p> </p>
 			<hr>
			<div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">

			<div class="title-bg">
			<h1 style="color:green;" class="title">Xeberin sekili</h1>
        </div>
        
        
 				
			<img width="400" src="<?php echo $xebercek['xeber_sekil']?>" alt="">
			<p><?php echo $xebercek['xeber_detay']?></p>
			<p><?php echo $xebercek['xeber_zaman']?></p>
            <p><?php echo $kullanicicek['kullanici_ad']." ".$kullanicicek['kullanici_soyad']?></p>

            </div>
			 
				 			
			</div>
		</div>
	</div>
	
 
	
	<?php require_once "footer.php"?>
	