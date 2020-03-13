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


                                <div class="settings-details tab-content">
                                    <div class="tab-pane fade active in" id="Personal">
                                        <h2 class="title-section">  Magaza basvurusu </h2>
                                        <div class="personal-info inner-page-padding">

                                        <?php 
                                        if ($kullanicicek['kullanici_magaza']==0) {?>


                                        <div class="personal-info inner-page-padding"> 
                                              <p>Asagidakilarin hamsini doldurmalisiniz</p>

                           <form action="nedmin/netting/kullanici.php" method="POST" class="form-horizontal" id="personal-info-form">

                                 
                                        <div class="form-group">
                                                <label class="col-sm-3 control-label">Mail <br>(deyisdire bilmezsen!) *</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" disabled="" value="<?php echo $kullanicicek['kullanici_mail']?>" id="first-name" type="text">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Banka Adi *</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="kullanici_banka" value="<?php echo $kullanicicek['kullanici_banka']?>" id="first-name" type="text">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">IBAN numaraniz *</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="kullanici_iban" value="<?php echo $kullanicicek['kullanici_iban']?>" id="first-name" type="text">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Ad *</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="kullanici_ad" value="<?php echo $kullanicicek['kullanici_ad']?>" id="first-name" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label">Soyad *</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="kullanici_soyad" value="<?php echo $kullanicicek['kullanici_soyad']?>" id="last-name" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label"> Telefon GSM  </label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" name="kullanici_gsm" value="<?php echo $kullanicicek['kullanici_gsm']?>" id="company-name" type="text">
                                                </div>
                                            </div>
                                           

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
                                                <label class="col-sm-3 control-label"> Onay *</label>
                                             <div class="checkbox">
                                                 <div class="col-sm-9">
                                                         <label><input type="checkbox" required="" value="">Kullanim sartlarini qebul edirem</label>
                                                 </div>
                                             </div>

                                         </div>

                                            <div class="form-group">
                                                 <div align="right" class="col-sm-12">
                                                   <button  class="update-btn" name="musterimagazabasvuru" type="submit" id="login-update"> Basvuruyu tamamla</button>

                                                 </div>
                                  </form> 
                                                 <?php } else if ($kullanicicek['kullanici_magaza']==1)  {?>
                                                            <div class="alert alert-success">
			    		                                      <strong>Bilgi!</strong> Basvurunuzu etmisiniz(onaylamisiniz)..
                                                              <p>Basvurular her 24 saat erzinde incelenir ve sonuclandirilir....</p>
                                                           </div>

                                                           <?php } else if ($kullanicicek['kullanici_magaza']==2)  {?>
                                                            <div class="alert alert-success">
			    		                                      <strong>Bilgi!</strong> Magazaniz onaylandi....
                                                              <p>Magaza yonetim bolmesinden magazanizi yonete bilersiniz....</p>
                                                           </div>
                                                <?php } ?>     

                                              
                                            </div>   
                                                                                   
                                        </div> 
                                    </div> 
 
                                </div> 

                            
              
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
