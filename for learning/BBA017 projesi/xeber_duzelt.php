<?php require_once 'header.php';
 islemkontrol ();
 
$xebersor=$db->prepare("SELECT * FROM xeber where kullanici_id=:kullanici_id and xeber_id=:xeber_id order by xeber_zaman DESC");
$xebersor->execute(array(
    'kullanici_id'=>$_SESSION['userkullanici_id'],
    'xeber_id'=>$_GET['xeber_id']
    
));
$xebercek=$xebersor->fetch(PDO::FETCH_ASSOC);

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


                            <form action="nedmin/netting/adminislem.php" method="POST"  enctype="multipart/form-data" class="form-horizontal" id="personal-info-form">
                                <div class="settings-details tab-content">
                                    <div class="tab-pane fade active in" id="Personal">
                                        <h2 style="color:red" class="title-section">Xeberinizi Duzelde bilerseniz Dostum:)</h2>
                                        <div class="personal-info inner-page-padding"> 
                                              
                                        <div class="form-group">
                                                <label class="col-sm-3 control-label">Xeberinizin sekili*</label>
                                                <div class="col-sm-9">
                                                <img width="280"  src="<?php echo $xebercek['xeber_sekil']?>" alt="">
                                                 </div>
                                            </div> 
                                            
                                        <div class="form-group">
                                                <label class="col-sm-3 control-label">Xeber ucun yeni sekil*</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="xeber_sekil" required=""  id="first-name" type="file">
                                                </div>
                                            </div> 
                                            
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label"> Xeberiniz*</label>
                                                <div class="col-sm-9">
                                                <textarea class="ckeditor" id="editor1" name="xeber_detay"> <?php echo $xebercek['xeber_detay']?> </textarea>
                                                 </div>
                                            </div>

                                            <input type="hidden" name="eski_yol" value="<?php echo $xebercek['xeber_sekil']?>">
                                            <input type="hidden" name="xeber_id" value="<?php echo $xebercek['xeber_id']?>">


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
                                            <div class="form-group">
                                                 <div align="right" class="col-sm-12">
                                                   <button  class="btn btn-success" name="xeberduzelt" type="submit" id="login-update">Xeberinizi duzeldin.</button>

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
