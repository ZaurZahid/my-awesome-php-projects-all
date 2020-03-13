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
			    		<strong>Hata!</strong> Islem basarisiz....
                        </div>
                        
                        <?php } else if ($_GET['durum']=="ok") {?>
                         <div class="alert alert-success">
			    		<strong>Bilgi!</strong> Islem basarili....
                        </div>
			        	<?php }
				                 ?>


                            <form action="nedmin/netting/adminislem.php" method="POST" enctype="multipart/form-data" class="form-horizontal" id="personal-info-form">
                                <div class="settings-details tab-content">
                                    <div class="tab-pane fade active in" id="Personal">
                                        <h2 class="title-section"> Profil Resim Guncelle </h2>
                                        <div class="personal-info inner-page-padding"> 
                                              
                                        <div class="form-group">
                             

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Resminiz (indiki)*</label>
                                                <div class="col-sm-9">
                                                    <img width="128" height="128" src="<?php echo $kullanicicek['kullanici_magazafoto'] ?>">
                                               </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Yeni Resminizi secin  *</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" required="" name="kullanici_magazafoto" id="first-name" type="file">
                                                </div>
                                            </div>
                                           
                                           <input type="hidden" name="eski_yol" value="<?php echo $kullanicicek['kullanici_magazafoto'] ?> ">
                                          
                                            <div class="form-group">
                                                 <div align="right" class="col-sm-12">
                                                   <button  class="update-btn" name="kullaniciresimguncelle" type="submit" id="login-update">Guncelle</button>

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
