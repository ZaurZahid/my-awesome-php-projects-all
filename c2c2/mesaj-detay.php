<?php require_once 'header.php';

islemkontrol ();


$mesajsor=$db->prepare("SELECT mesaj.*, kullanici.* FROM mesaj  inner join kullanici on mesaj.kullanici_gonderen=kullanici.kullanici_id
where kullanici.kullanici_id=:id and mesaj.mesaj_id=:mesaj_id order by mesaj_okunma,mesaj_zaman DESC");
$mesajsor->execute(array(
   'id'=>$_GET['kullanici_gonderen'],
   'mesaj_id'=>$_GET['mesaj_id']
   
));
$mesajcek=$mesajsor->fetch(PDO::FETCH_ASSOC);


if ($mesajcek['kullanici_gelen']==$_SESSION['userkullanici_id'] and $mesajcek['mesaj_okunma']==0) {
    $okunma=$db->prepare("UPDATE mesaj SET
      
      mesaj_okunma=:mesaj_okunma
      where mesaj_id={$_GET['mesaj_id']}
      ");
    $okunmainsert=$okunma->execute(array(
      'mesaj_okunma' => 1
     
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
			    		<strong>Bilgi!</strong> Mesajiniz basari ile gonderildi..
		        		</div>
					
				 
					
			        	<?php }
				                 ?>


                            <form action="nedmin/netting/kullanici.php" method="POST"  enctype="multipart/form-data" class="form-horizontal" id="personal-info-form">
                                <div class="settings-details tab-content">
                                    <div class="tab-pane fade active in" id="Personal">
                                        <h2 class="title-section">Mesaj gonder islemleri</h2>
                                        <div class="personal-info inner-page-padding"> 
                                               
                                           
                                        <div class="form-group">
                                                <label class="col-sm-3 control-label"> Mesaj Detayi  *</label>
                                                <div class="col-sm-9">
                                                <p><?php echo $mesajcek['mesaj_detay']?></p>
                                                 </div>
                                            </div> 

<?php if ($_GET['gedenmesaj']!=="ok") {?>
   
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Cavab verilen teref  *</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" disabled="" name="kullanici_gonderen"  value="<?php echo $mesajcek['kullanici_ad']." ".$mesajcek['kullanici_soyad']?>" id="first-name" type="text">
                                                </div>
                                            </div>
                                         
                                          
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label"> Mesajiniz  *</label>
                                                <div class="col-sm-9">
                                                <textarea class="ckeditor" id="editor1" name="mesaj_detay"  required=""></textarea>
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
            
            <input type="hidden" name="kullanici_gelen" value="<?php echo $_GET['kullanici_gonderen']?>">
                                            <div class="form-group">
                                                 <div align="right" class="col-sm-12">
                                                   <button  class="update-btn" name="mesajcavabver" type="submit" id="login-update">Mesaj gonder</button>

                                                 </div>
                                            </div>                                        
                                <?php } ?>
                                        
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
<script type="text/javascript">

$(document).ready(function(){


$("#kullanici_tip").change(function(){

var tip=$("#kullanici_tip").val();
if (tip=="PERSONAL") {
    $("#kurumsal").hide();
    $("#tc").show();
}
else if (tip=="PRIVATE_COMPANY") {
    $("#kurumsal").show();
    $("#tc").hide();
}

}).change();



});




</script>