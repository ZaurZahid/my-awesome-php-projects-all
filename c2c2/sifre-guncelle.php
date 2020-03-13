<?php require_once 'header.php';

islemkontrol ();
?>
           
            <!-- Inner Page Banner Area Start Here -->
            <div class="pagination-area bg-secondary">
                <div class="container">
                    <div class="pagination-wrapper">
                       
                    </div>
                </div>  
            </div> 
            <!-- Inner Page Banner Area End Here -->          
            <!-- Settings Page Start Here -->
            <div class="settings-page-area bg-secondary section-space-bottom">
                <div class="container">
                    <div class="row settings-wrapper">

                      <?php require_once 'hesabim-sidebar.php';?>
                    
                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">

                        <?php 

		        		if ($_GET['durum']=="hata") {?>

			        	<div class="alert alert-danger">
			    		<strong>Hata!</strong> Islem basarisiz.
                        </div>
                        
                        <?php } else if ($_GET['durum']=="ok") {?>
                         <div class="alert alert-success">
			    		<strong>Bilgi!</strong> Islem basarili..
                        </div>
                        
                        <?php } else if ($_GET['durum']=="eskisifrehata") {?>
                         <div class="alert alert-danger">
			    		<strong>Bilgi!</strong> Eski sifre hatalidir..
		        		</div>
                         
                        <?php } else if ($_GET['durum']=="sifreleruyusmuyor") {?>
                            <div class="alert alert-danger">
                           <strong>Bilgi!</strong> Sifreler uyusmuyor..
                           </div>
                        
                        
                        <?php } else if ($_GET['durum']=="eksiksifre") {?>
                         <div class="alert alert-danger">
			    		<strong>Bilgi!</strong> Sifrenin miqdari azdir..
		        		</div>
                        
			        	<?php }
				                 ?>


                            <form action="nedmin/netting/kullanici.php" method="POST" class="form-horizontal" id="personal-info-form">
                                <div class="settings-details tab-content">
                                    <div class="tab-pane fade active in" id="Personal">
                                        <h2 class="title-section"> Sifre  duzenle </h2>
                                        <div class="personal-info inner-page-padding"> 
                                              
                                        <div class="form-group">
                             

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Eski sifreninizi girin *</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="kullanici_eskipassword" placeholder="Eski sifreninizi girin" id="first-name" type="password">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Sifreniz *</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="kullanici_passwordone" placeholder="Sifrenizi girin" id="first-name" type="password">
                                                </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Sifrenizi tekrar girin *</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="kullanici_passwordtwo" placeholder="Siferinizi tekrar girin" id="first-name" type="password">
                                                </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                 <div align="right" class="col-sm-12">
                                                   <button  class="update-btn" name="musterisifreguncelle" type="submit" id="login-update"> Sifre guncelle</button>

                                                 </div>
 
                                            </div>                                        
                                        </div> 
                                    </div> 

                
                                </div> 

                            </form> 
                        </div>  
                    </div>  
                </div>  
            </div> 
            <!-- Settings Page End Here -->
            <?php require_once 'footer.php';?>
