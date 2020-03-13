<?php require_once 'header.php';
islemkontrol ();
$mesajsor=$db->prepare("SELECT mesaj.*,kullanici.* FROM mesaj
 inner join kullanici on mesaj.kullanici_mesajgonderen=kullanici.kullanici_id where kullanici.kullanici_id=:id
 and mesaj.mesaj_id=:mesaj_id
 order by mesaj_zaman DESC");
 $mesajsor->execute(array(
 'id'=>$_GET['kullanici_mesajgonderen'],
 'mesaj_id'=>$_GET['mesaj_id']
));
$mesajcek=$mesajsor->fetch(PDO::FETCH_ASSOC); 
if ($mesajcek['mesaj_oxunma']==0) {
    $oxunmaduzelt=$db->prepare("UPDATE mesaj set
    mesaj_oxunma=:m 
    where mesaj_id={$_GET['mesaj_id']}");
    
    $update=$oxunmaduzelt->execute(array(
        'm'=>1 
    ));
}





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
                                                <label class="col-sm-3 control-label">Mesaj Detayi*</label>
                                                <div class="col-sm-9">
                                                <p><?php echo $mesajcek['mesaj_detay']?></p>
                                            </div>
                                            </div> 
                                            <?php if ($_GET['gedenmesaj']!==ok) {?>
                                               
                                            

                                        <div class="form-group">
                                                <label class="col-sm-3 control-label">Cavab verilen teref*</label>
                                                <div class="col-sm-9">
                                                    <input disabled="" class="form-control"  id="first-name" value="<?php echo $mesajcek['kullanici_ad']." ".$mesajcek['kullanici_soyad']?>" type="text">
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
<input type="hidden" name="kullanici_mesajgelen" value="<?php echo $_GET['kullanici_mesajgonderen'] ?>">
                                            <div class="form-group">
                                                 <div align="right" class="col-sm-12">
                                                   <button  class="btn btn-success" name="mesajcavabver" type="submit" id="login-update">Mesaj Gonder.</button>

                                                 </div>
 
                                            </div>
                                        <?php }?>                                       
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
