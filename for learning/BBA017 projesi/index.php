<?php require_once "header.php"?>

	<section id="main-slider" class="no-margin">
        <div class="carousel slide">      
            <div class="carousel-inner">
                <div class="item active" style="background-image: url(img/slider/bg1.jpg)">
                    <div class="container">
                        <div class="row slide-margin">
                            <div class="col-sm-6">
                                <div class="carousel-content">
                                    <h2 class="animation animated-item-1">Xos Gelmisiniz <br> <span>BBA-017</span></h2>
                                    <p class="animation animated-item-2">Bu bizim resmi web sehifemizdir.Sizi burada gormeyimize cox sadiq</p>
                                    <a class="btn-slide animation animated-item-3" href="haqqimizda">Haqqimizda</a>
                                </div>
                            </div>

                            <div class="col-sm-6 hidden-xs animation animated-item-4">
                                <div class="slider-img">
                                    <img src="img/slider/img3.png" class="img-responsive">
                                </div>
                            </div>

                        </div>
                    </div>
                </div><!--/.item-->             
            </div><!--/.carousel-inner-->
        </div><!--/.carousel-->
    </section><!--/#main-slider-->

	 
	<div class="feature">
		<div class="container">
			<div class="text-center">
				<h1 style="color:red;">Statuslar</h1>
			<?php 
			$statussor=$db->prepare("SELECT * FROM status where kullanici_id=:kullanici_id order by status_zaman DESC limit 3");
			$statussor->execute(array(
				'kullanici_id'=>$_SESSION['userkullanici_id']

		 		));
		      while($statuscek=$statussor->fetch(PDO::FETCH_ASSOC))  {  
		  		?> 
		<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
		<img width="150" style="border-radius:150px;" src="<?php echo $statuscek['status_sekil']?>" alt="">
 						<h2 ><a style="color:brown;" href="status-<?=seo($kullanicicek['kullanici_ad']." ".$kullanicicek['kullanici_soyad']." ".$statuscek['status_id'])?>"><?php echo $kullanicicek['kullanici_ad']." ".$kullanicicek['kullanici_soyad']?></a></h2>
						<p><?php echo substr($statuscek['status_detay'],0,100)?></p>
					</div>
	 <?php } ?>
				</div>
 

			</div>
		</div>
	</div>
	<!-- 	//------------------------------------------------------------------------------------------------------
 -->


 <!-- ------------------------------------------------------------------------------------------------------ -->
<div class="our-team">
		<div class="container">
			<h3>Istifadeciler</h3>	

<?php
 $kullanicisor=$db->prepare("SELECT*FROM kullanici limit 3 ");
 $kullanicisor->execute();

 while($kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC)) { ?>
			<div class="text-center">
				<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
				<a href="kullanici-<?=seo($kullanicicek['kullanici_ad']." ".$kullanicicek['kullanici_soyad']." ".$kullanicicek['kullanici_id'])?>"><img height="250" width="250" src="<?php echo $kullanicicek['kullanici_foto']?>" alt="" ></a>
					
					<h4><a style="color:blue;" href="kullanici-<?=seo($kullanicicek['kullanici_ad']." ".$kullanicicek['kullanici_soyad']." ".$kullanicicek['kullanici_id'])?>"><?php echo $kullanicicek['kullanici_ad']." ".$kullanicicek['kullanici_soyad']?></a></h4>
					<p><?php echo $kullanicicek['kullanici_seher']?></p>
				</div> 
			</div>
 <?php } ?>

		</div>
	</div>
<!-- ------------------------------------------------------------------------------------------------------ -->
	<div class="about">
		<div class="container">
			<div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms" >
				<h2>Haqqimizda</h2>
				<img width="680" src="<?php echo $ayarcek['ayar_logo']?>" class="img-responsive"/>
				<p> 
				</p>
			</div>
			
			<div class="col-md-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms" >
				<h2><?php echo $haqqimizdacek['hakkimizda_baslik']?></h2>
				<p>  <?php echo substr($haqqimizdacek['hakkimizda_detay'],0,1400)?>
				</p> 
				<a href="haqqimizda" class="btn btn-default btn-success btn-sm">Devamını Oxu</a>

			</div>
		</div>
	</div>
<!-- 	//------------------------------------------------------------------------------------------------------
 -->	
 <!-- 	//------------------------------------------------------------------------------------------------------
 -->		<div class="lates">
		<div class="container">
		<div class="text-center">
			<h2>Xeberler</h2>
		</div>
		<!-- burada eslinde kullanici sorgusu olmamaliydi -->
		<?php 
	    	$kullanicisor=$db->prepare("SELECT*FROM kullanici where kullanici_id=:id");
 		  $kullanicisor->execute(array(
			   'id'=>$_SESSION['userkullanici_id']
		   ));
	    $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
 ?>

		<?php 
			$xebersor=$db->prepare("SELECT * FROM xeber where kullanici_id=:kullanici_id order by xeber_zaman DESC limit 4");
			$xebersor->execute(array(
				'kullanici_id'=>$_SESSION['userkullanici_id']

		 		));
		      while($xebercek=$xebersor->fetch(PDO::FETCH_ASSOC))  {  ?>
		<div class="col-md-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
		<a href="xeber-<?=seo($kullanicicek['kullanici_ad']." ".$kullanicicek['kullanici_soyad']." ".$xebercek['xeber_id'])?>"><img src="<?php echo $xebercek['xeber_sekil']?>" class="img-responsive"/></a>
			<h3><a href="xeber-<?=seo($kullanicicek['kullanici_ad']." ".$kullanicicek['kullanici_soyad']." ".$xebercek['xeber_id'])?>">Yeni xeber var.</a></h3>
			<p><?php echo substr($xebercek['xeber_detay'],0,150)?>
			</p>
		</div> 
			  <?php } ?>
	</div>
</div>
<!--  	 ------------------------------------------------------------------------------------------------------
 -->
 
<?php
 $kullanicisor=$db->prepare("SELECT * FROM kullanici limit 11");
$kullanicisor->execute();


?>
 <div class="widget blog_gallery">
                        <h3 style="color:red">------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h3>						<h3 style="color:blue">-------------------------------------------------------------------------------------------</h3>
					 
						<ul class="sidebar-gallery">

<?php 
while($kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC)){

?>


                            <li>
							<a href="kullanici-<?=seo($kullanicicek['kullanici_ad']." ".$kullanicicek['kullanici_soyad']." ".$kullanicicek['kullanici_id'])?>"><img height="100" width="105" src="<?php echo $kullanicicek['kullanici_foto']?>" alt="" ></a>
                            </li>
                            
<?php } ?>
						</ul>
						
						<h3 style="color:blue">-------------------------------------------------------------------------------------------</h3><h3 style="color:red">------------------------------------------------------------------------------------------------------------------------------------------------------------------------</h3>

                    </div>
					<hr>    <div align="center">
					<ul class="pagination pagination-lg"> 
                        <li class="active"><a href="index">1</a></li>
                        <li><a href="haqqimizda">2</a></li>
                        <li><a href="service">3</a></li>
                        <li><a href="unihaqqinda">4</a></li>
                        <li><a href="contact">5</a></li>
					 
                        <li><a href="haqqimizda">Sonraki<i class="fa fa-long-arrow-right"></i></a></li>
                    </ul>
                    <!--/.pagination-->
 	</div>
	<?php require_once "footer.php"?>
