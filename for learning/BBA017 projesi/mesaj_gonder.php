<?php require_once 'header.php';
 
 islemkontrol ();
 
 $kullanicisor=$db->prepare("SELECT * FROM kullanici where kullanici_id=:kullanici_id  ");
 $kullanicisor->execute(array(
     
     'kullanici_id'=>$_GET['kullanici_mesajgelen']
     
 ));
 $kullanicicek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
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
					
				 
					
			        	<?php }
				                 ?>


                            <form action="nedmin/netting/kullanici.php" method="POST"   class="form-horizontal" id="personal-info-form">
                                <div class="settings-details tab-content">
                                    <div class="tab-pane fade active in" id="Personal">
                                        <h2 style="color:red" class="title-section">Mesaj Gonder Dostum:)</h2>
                                        <div class="personal-info inner-page-padding"> 
                                              
       
                                        <div class="form-group">
                                                <label class="col-sm-3 control-label">Mesaj gonderilen teref*</label>
                                                <div class="col-sm-9">
                                                    <input disabled="" class="form-control"  id="first-name" value="<?php echo $kullanicicek['kullanici_ad']." ".$kullanicicek['kullanici_soyad']?>" type="text">
                                                </div>
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label"> Mesajiniz*</label>
                                                <div class="col-sm-9">
                                                <textarea class="ckeditor" id="editor1" name="mesaj_detay">  </textarea>
                                                 </div>
                                            </div>
       <script type="text/javascript">

             CKEDITOR.replace( 'editor1',

             {

              filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

              filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

              filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

              filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

              filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

              filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

              forcePasteAsPlainText: true

            } 

            );

       </script> 
<input type="hidden" name="kullanici_mesajgelen" value="<?php echo $_GET['kullanici_mesajgelen'] ?>">
                                            <div class="form-group">
                                                 <div align="right" class="col-sm-12">
                                                   <button  class="btn btn-success" name="mesajgonder" type="submit" id="login-update">Mesaj Gonder.</button>

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
