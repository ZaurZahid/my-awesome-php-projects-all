 <?php require_once "header.php"?>
 <hr>
	<section id="portfolio">	
        <div class="container">
            <div class="center">
               <p>Siz Bizim Universitet Haqqinda sekillere asagidan baxa bilersiz</p>
            </div>

            <ul class="portfolio-filter text-center">
                <li><a class="btn btn-default active" href="#" data-filter="*">Butun</a></li>
                <li><a class="btn btn-default" href="#" data-filter=".bootstrap">Maraqli</a></li> 
            </ul><!--/#portfolio-filter-->
		</div>
		<div class="container">
            <div class="">
                <div class="portfolio-items">
                    
                <?php
 $unisor=$db->prepare("SELECT * FROM uni  ");
$unisor->execute();


?>
<?php  while($unicek=$unisor->fetch(PDO::FETCH_ASSOC)){ ?>
                    <div class="portfolio-item     bootstrap   col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                        <a class="preview" href="<?php echo $unicek['uni_sekil']?>"  rel="prettyPhoto"><img style="height:200px;width:400px;"  src="<?php echo $unicek['uni_sekil']?>" alt=""></a>
                            <div class="overlay">
                                <div class="recent-work-inner">
                                    <h3><a class="preview" href="<?php echo $unicek['uni_sekil']?>" rel="prettyPhoto"><?php echo $unicek['uni_basliq']?></a></h3>
                                    <p><?php echo substr($unicek['uni_detay'],0,100)?></p>
                                    <a class="preview" href="<?php echo $unicek['uni_sekil']?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                                </div> 
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->
                    <div class="portfolio-item joomla  html   col-xs-12 col-sm-4 col-md-3">
                        <div class="recent-work-wrap">
                             <div class="overlay">
                              
                            </div>
                        </div>          
                    </div><!--/.portfolio-item-->
<?php } ?>
                </div>
            </div>
        </div>
    </section><!--/#portfolio-item-->
	<hr> <div align="center">
					<ul class="pagination pagination-lg">
                        <li><a href="service"><i class="fa fa-long-arrow-left"></i>Evvelki</a></li>
                        <li ><a href="index">1</a></li>
                        <li><a href="haqqimizda">2</a></li>
                        <li><a href="service">3</a></li>
                        <li class="active"><a href="unihaqqinda">4</a></li>
                        <li><a href="contact">5</a></li> 
                        <li><a href="contact">Sonraki<i class="fa fa-long-arrow-right"></i></a></li>
                    </ul>
                    <!--/.pagination-->
 	</div>
    <?php require_once "footer.php"?>
    