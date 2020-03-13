<?php require_once 'header.php';?>
                   
            <!-- Registration Page Area Start Here -->
            <div class="registration-page-area bg-secondary section-space-bottom">
                <div class="container">
                    <h2 class="title-section">Kayit islemleri</h2>
                    <div class="registration-details-area inner-page-padding">

                    <?php 

				if ($_GET['durum']=="hata") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Bele bir sey yoxdur.
                </div>
                
                <?php } else if ($_GET['durum']=="exit") {?>
                <div class="alert alert-success">
					<strong>Bilgi!</strong> Cixis oldu.
				</div>
                <?php } else if ($_GET['durum']=="captchahata") {?>
                <div class="alert alert-danger">
					<strong>Bilgi!</strong> Sifre sehvdir
				</div>
				 
					
				<?php }
				 ?>
                        <form action="nedmin/netting/kullanici.php" method="POST" id="personal-info-form">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                                    <div class="form-group">
                                        <label class="control-label" for="first-name">Kullanici Mailiniz *</label>
                                        <input type="email" id="first-name" required="" placeholder="Mailinizi girin......(Kullanici adiniz olacaq)" name="kullanici_mail"  class="form-control">
                                    </div>
                                </div>

                                
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                                    <div class="form-group">
                                        <label class="control-label" for="email">Sifreniz*</label>
                                        <input type="password" id="email" required="" placeholder="Sifrenizi girin......" name="kullanici_password" class="form-control">
                                    </div>
                                </div>
                            </div>
                                
  
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                                           
                                    <div class="pLace-order">
                                        <button class="update-btn disabled" type="submit"   name="kullanicigiris" >Daxil ol</button> 
                 
                                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sifremiUnuttum" data-whatever="@mdo">Sifremi Unuttum</button>

                                  
                                    </div> 
                                </div>
                            </div> 
                            </form>                   
                    </div> 
                </div>
            </div>
            <!-- modal start -->
<?php

$z=$uretilensifre=123456789;
echo "yeni-sifre".$z."olacaq";
      
     
?>
 <form action="nedmin/netting/sifremi-unuttum.php?x=<?php echo $uretilensifre?>" method="POST">
 
        <div class="modal fade" id="sifremiUnuttum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Sifre Sifirlama</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                
                    <div class="modal-body">
                        <div class="form-group">
                            <p><b>Diqqet:</b>Girdiyiniz mail adresi varsa , sifre ora gonderilecek.</p>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Mail Adresiniz:</label>
                            <input type="text" name="kullanici_mail" class="form-control" id="recipient-name">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Bagla</button>
                        <button type="submit" name="sifremiunuttum" class="btn btn-primary">Sifre talep et</button> 
                    </div>
                </div>
           </div>
        </div>
</form>
 <!-- modal finish -->
 <!-- Registration Page Area End Here -->
<?php require_once 'footer.php';?>