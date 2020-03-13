<?php require_once 'header.php';?>
<section id="contact-page">
    <div class="container">
        <div class="center">   <p>a</p><p> </p>       
            <h2>Qeydiyyatdan kec</h2>
            <p>Bu sehife hesabiniza daxil olmaq ucundur....</p>
        </div> 
        <div class="row contact-wrap"> 
            <div class="status alert alert-success" style="display: none"></div>

            <?php 

				if ($_GET['durum']=="hata") {?>

				<div class="alert alert-danger">
					<strong>Hata!</strong> Bele bir sey yoxdur.
                </div>
                
                <?php }  else if ($_GET['durum']=="exit") {?>

				<div class="alert alert-success">
					<strong>Bilgi!</strong> Cixis oldu.
                </div>
                
                <?php } ?>
            <form action="nedmin/netting/kullanici.php"  method="POST"  id="main-contact-form">
            
            <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
            <div class="form-group">
                        <label>Kullanici Emailiniz *</label>
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
           
                    
                    <div class="form-group">
                        <button type="submit" name="musterigiris" class="btn btn-primary btn-lg" required="required">Daxil ol</button>
                    </div>
                </div>
     </form> 
        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#contact-page-->
<hr><hr><hr><hr>
<?php require_once 'footer.php' ?>