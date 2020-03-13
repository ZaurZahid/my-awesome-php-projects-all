<?php require_once "header.php"?>

 
	<div class="aboutus">
		<div class="container">   <p> </p>
			<h3>Bizim Qrup Haqqinda Melumat</h3>
			<hr>
			<div class="col-md-7 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">

			<div class="title-bg">
			<div class="title">Qrup Videosu</div>
		</div>
		<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $haqqimizdacek['hakkimizda_video']?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				<h4><?php echo $haqqimizdacek['hakkimizda_baslik']?></h4>
				<p><?php echo $haqqimizdacek['hakkimizda_detay']?></p>
			</div>
			<div class="col-md-5 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
				<div class="skill">
					<h2>Fennlerimiz</h2>
					<p>Fenlerimizin creditlerine asagidan baxa bilerik.</p>

					<div class="progress-wrap">
						<h3>ENGLISH</h3>
						<div class="progress">
						  <div class="progress-bar  color1" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 85%">
							<span class="bar-width">85%</span>
						  </div>

						</div>
					</div>

					<div class="progress-wrap">
						<h4>CALCULUS</h4>
						<div class="progress">
						  <div class="progress-bar color2" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 95%">
						   <span class="bar-width">95%</span>
						  </div>
						</div>
					</div>

					<div class="progress-wrap">
						<h4>SYSTEM ENGINEERING</h4>
						<div class="progress">
						  <div class="progress-bar color3" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
							<span class="bar-width">80%</span>
						  </div>
						</div>
					</div>

					<div class="progress-wrap">
						<h4>PROGRAMMING</h4>
						<div class="progress">
						  <div class="progress-bar color4" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
							<span class="bar-width">90%</span>
						  </div>
						</div>
					</div>




				</div>				
			</div>
		
		</div> <hr>  	<div align="center">
					<ul class="pagination pagination-lg">
                        <li><a href="index"><i class="fa fa-long-arrow-left"></i>Evvelki</a></li>
                        <li ><a href="index">1</a></li>
                        <li class="active"><a href="haqqimizda">2</a></li>
                        <li><a  href="service">3</a></li>
                        <li><a href="unihaqqinda">4</a></li>
                        <li><a href="contact">5</a></li> 
                        <li><a href="service">Sonraki<i class="fa fa-long-arrow-right"></i></a></li>
                    </ul>
                    <!--/.pagination-->
 	</div>
	</div>
	

	
	<?php require_once "footer.php"?>
	