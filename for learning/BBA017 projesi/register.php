<?php require_once 'header.php';?>
<section id="contact-page">
    <div class="container">
    
        <div class="center">        <p>a</p><p>  </p>
            <h2>Qeydiyyatdan kec</h2>
            <p>Bu sehife qeydiyyat ucundur....</p>
        </div> 
        <div class="row contact-wrap"> 
            <div class="status alert alert-success" style="display: none"></div>


            <?php 

if ($_GET['durum']=="farklisifre") {?>

<div class="alert alert-danger">
    <strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor.
</div>    
<?php } if ($_GET['durum']=="eksiksifre") {?>
    
    <div class="alert alert-danger">
        <strong>Hata!</strong> Girdiğiniz şifrelerin sayi eyni deyil.
    </div>    
    <?php }if ($_GET['durum']=="mukerrerkayit") {?>

<div class="alert alert-danger">
    <strong>Hata!</strong>  Bu Kullanici evvel qeydiyyatdan kecib.
</div>    
<?php }if ($_GET['durum']=="loginbasarili") {?>

<div class="alert alert-success">
    <strong>Hata!</strong> Qebul olundunuz.
</div>    
<?php }
 ?>
    <form action="nedmin/netting/kullanici.php"  method="POST"  id="main-contact-form"  > 
      
    <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">    
                    <div class="form-group">
                    <label style="color:black">Mailiniz *</label>
                    <input type="text" id="first-name" required="" placeholder="Mailinizi girin......(Kullanici adiniz olacaq)" name="kullanici_mail"  class="form-control">
                   
                </div>
           </div>

           <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
           <div class="form-group">
               <label style="color:black" for="last-name">Adiniz *</label>
               <input type="text" id="last-name" required="" placeholder="Adinizi girin......" name="kullanici_ad" class="form-control">
                      </div>
                 </div>
             </div>

          <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                                           
                    <div class="form-group">
                        <label style="color:black" for="company-name">Soyadiniz</label>
                        <input type="text" id="company-name" required="" placeholder="Soyadinizi girin......" name="kullanici_soyad" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                    <div class="form-group">
                        <label style="color:black" for="email">Sifreniz*</label>
                        <input type="password" id="email" required="" placeholder="Sifrenizi girin......" name="kullanici_passwordone" class="form-control">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                    <div class="form-group">
                        <label style="color:black" for="phone">Sifreniz tekrar *</label>
                        <input type="password" id="phone" required="" placeholder="Sifrenizi tekrar girin......" name="kullanici_passwordtwo" class="form-control">
                    </div>
                </div>
            </div>                                  
           
                    
                    <div class="form-group">
                        <button type="submit" name="musterikaydet" class="btn btn-primary btn-lg" required="required">Gonder</button>
                    </div>
                </div>
     </form> 
        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#contact-page-->

<?php require_once 'footer.php' ?>