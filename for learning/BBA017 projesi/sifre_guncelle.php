<?php require_once 'header.php';
 islemkontrol ();
 ?>
<section id="contact-page">
    <div class="container">
    
        <div class="center">        <p>a</p><p>  </p>
            <h2>Sifre bilgilerinizi Duzelde bilersiniz</h2>
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
                            <strong>Hata!</strong>Sifre tezeleme alinmadi....
                            </div>

                            <?php } else if ($_GET['durum']=="ok") {?>
                                <div class="alert alert-success">
                               <strong>Bilgi!</strong>Sifre tezeleme alindi....
                               </div>
                               <?php } else if ($_GET['durum']=="indikisifrenizhata") {?>
                                <div class="alert alert-danger">
                               <strong>Bilgi!</strong>Indiki sifrenizi sehv yazmisiniz....
                               </div>
                               <?php } else if ($_GET['durum']=="sifrelerinizeynideyil") {?>
                                <div class="alert alert-danger">
                               <strong>Bilgi!</strong>Sifrelerinizi eyni yazmamisiniz....
                               </div>
                               <?php } else if ($_GET['durum']=="sifrenizinsayisehvdir") {?>
                                <div class="alert alert-danger">
                               <strong>Bilgi!</strong>Sifreleriniz en azi 6 isareli olmalidir....
                               </div>
             <?php }
            ?>
 
 <form action="nedmin/netting/kullanici.php"  method="POST"  id="main-contact-form"> 
 <hr> 
       <div class="form-group">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
                    <label style="color:green">Indiki sifreniz*</label>
                    <input   id="first-name" name="indiki_sifre"  placeholder="Indiki sifrenizi zehmet olmasa yazin...." class="form-control">
           </div>
      </div>

      <div class="form-group">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
                    <label style="color:blue">Yeni sifreniz*</label>
                    <input   id="first-name" name="yeni_sifre"  placeholder="Yeni sifrenizi zehmet olmasa yazin...." class="form-control">
           </div>
      </div>

      <div class="form-group">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">  
                    <label style="color:red">Yeni sifrenizin tekrari*</label>
                    <input   id="first-name" name="yenitekrar_sifre"  placeholder="Yeni sifrenizin tekrarini zehmet olmasa yazin...." class="form-control">
           </div>
      </div>


         <div class="form-group">
               <div align="right" class="col-sm-12">
               <button class="btn btn-info" name="isdifadecisifreduzelt" type="submit">Sifre bilgilerinizi duzelt</button>
                 </div>
         </div>   
          
         <div class="form-group">
               <div align="right" class="col-sm-12">-----------------------------------------
               </div>
         </div>   

         <div class="form-group">
               <div align="right" class="col-sm-12">
                    <a href="profil_resmiduzelt.php" class="btn btn-success" >Profil resmini deyise bilersiniz=>>>></a>
                </div>
         </div>   
          

  </form>
 

            </div><!--/.row-->
    </div><!--/.container--> <hr><hr>  <hr>
</section><!--/#contact-page-->

<?php require_once 'footer.php' ?>