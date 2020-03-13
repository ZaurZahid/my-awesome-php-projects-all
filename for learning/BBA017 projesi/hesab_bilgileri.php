<?php require_once 'header.php';
islemkontrol ();
?>
<section id="contact-page">
    <div class="container">
    
        <div class="center">        <p>a</p><p>  </p>
            <h2>Hesab bilgilerinizi Duzelde bilersiniz</h2>
            <p>Dostum:)....</p>
        </div> 
<hr>
<ul  class="nav nav-tabs" role="tablist"> 
<li role="presentation"><a  href="hesab_bilgileri.php" class="btn btn-info"  >Hesab haqqinda bilgilerim=>>>></a></li>
<li role="presentation"><a  href="adress_bilgileri.php"  class="btn btn-danger">Adress haqqinda bilgilerim=>>>></a></li>
<li role="presentation"><a  href="sifre_guncelle.php" class="btn btn-success" >Sifre haqqinda bilgilerim=>>>></a></li> 
  <li role="presentation"><a  href="profil_resmiduzelt.php" class="btn btn-warning" >Profil resmini deyis dostum=>>>></a></li> 
<hr><hr> <hr> 

</ul>
 

        <div class="row contact-wrap"> 
            <div class="status alert alert-success" style="display: none"></div>

            <?php

                if ($_GET['durum']=="no") {?>
    
                            <div class="alert alert-danger">
                            <strong>Hata!</strong> Islem basarisiz....
                            </div>

                            <?php } else if ($_GET['durum']=="ok") {?>
                                <div class="alert alert-success">
                               <strong>Bilgi!</strong> Islem basarili....
                               </div>
             <?php }
            ?>
 <form action="nedmin/netting/kullanici.php"  method="POST"  id="main-contact-form"> 
 <hr>
       <div class="form-group">
         <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
          <label style="color:red">Mailiniz(Deyisdere bilmezsiniz)*</label>
                    <input  id="first-name" disabled="" value="<?php echo $kullanicicek['kullanici_mail']?>"  class="form-control">
            </div>
        </div>

       <div class="form-group">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
                    <label style="color:green">Ad*</label>
                    <input   id="first-name" name="kullanici_ad" value="<?php echo $kullanicicek['kullanici_ad']?>" class="form-control">
           </div>
      </div>

            <div class="form-group">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                   <label style="color:blue">Soyad*</label>
                    <input   id="first-name" name="kullanici_soyad" value="<?php echo $kullanicicek['kullanici_soyad']?>" class="form-control">
              </div>
          </div>

           <div class="form-group">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
                      <label style="color:brown">Telefon nomreniz*</label>
                       <input   id="first-name" name="kullanici_tel" value="<?php echo $kullanicicek['kullanici_tel']?>" class="form-control">
               </div>
          </div> 

           <div class="form-group">
               <div align="right" class="col-sm-12">
                    <button class="btn btn-info" name="hesabimbilgiduzelt" type="submit"> Bilgilerimi Duzelt</button>
                </div>
         </div>  

         <div class="form-group">
               <div align="right" class="col-sm-12">-----------------------------------------
               </div>
         </div>   

         <div class="form-group">
               <div align="right" class="col-sm-12">
                    <a href="adress_bilgileri.php" class="btn btn-danger" >Adress bilgilerime get=>>>></a>
                </div>
         </div>   
          
  </form>

            </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#contact-page-->

<?php require_once 'footer.php' ?>