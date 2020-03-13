<?php require_once 'header.php';

islemkontrol();
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


                            <form action="nedmin/netting/kullanici.php" method="POST" class="form-horizontal" id="personal-info-form">
                                <div class="settings-details tab-content">
                                    <div class="tab-pane fade active in" id="Personal">
                                        <h2 class="title-section">  Adres bilgilerimi duzenle </h2>
                                        <div class="personal-info inner-page-padding"> 
                                              
                                        <div class="form-group">
                                                <label class="col-sm-3 control-label">Ferdi/Teskilati</label>
                                                <div class="col-sm-9">
                                                    <div class="custom-select">
                                                        <select name="kullanici_tip" id="kullanici_tip" class='select2'>
                                                            <option
                                                            <?php 
                                                            if ($kullanicicek['kullanici_tip']=="PERSONAL") {
                                                               echo "selected";
                                                            }?>
                                                            value="PERSONAL">Ferdi</option>
                                                            <option
                                                            <?php 
                                                            if ($kullanicicek['kullanici_tip']=="PRIVATE_COMPANY") {
                                                               echo "selected";
                                                            }?>
                                                            value="PRIVATE_COMPANY">Teskilati</option>
                                                          
                                                    
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                      <div id="tc">
                                           <div class="form-group">
                                                <label class="col-sm-3 control-label">T.C *</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="kullanici_tc" value="<?php echo $kullanicicek['kullanici_tc']?>" id="first-name" type="text">
                                                </div>
                                            </div>
                                    </div>

                                 <div id="kurumsal">
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Firma unvani*</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="kullanici_unvan" value="<?php echo $kullanicicek['kullanici_unvan']?>" id="first-name" type="text">
                                                </div>
                                            </div>
                                         

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Firma Vergi dairesi  *</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="kullanici_vdaire" value="<?php echo $kullanicicek['kullanici_vdaire']?>" id="first-name" type="text">
                                                </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Firma Vergi nomresi *</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="kullanici_vno" value="<?php echo $kullanicicek['kullanici_vno']?>" id="first-name" type="text">
                                                 </div>
                                            </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Acik adres *</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="kullanici_adres" required="" value="<?php echo $kullanicicek['kullanici_adres']?>" id="first-name" type="text">
                                                 </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Firma İl *</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="kullanici_il" required="" value="<?php echo $kullanicicek['kullanici_il']?>" id="first-name" type="text">
                                                 </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Firma İlce *</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="kullanici_ilce" required="" value="<?php echo $kullanicicek['kullanici_ilce']?>" id="first-name" type="text">
                                                 </div>
                                            </div>


                                            <div class="form-group">
                                                 <div align="right" class="col-sm-12">
                                                   <button  class="update-btn" name="musteriadresguncelle" type="submit" id="login-update"> Bilgileri guncelle</button>

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