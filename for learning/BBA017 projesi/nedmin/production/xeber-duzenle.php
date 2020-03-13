<?php 

require_once 'header.php'; 


 
$xebersor=$db->prepare("SELECT xeber.*,kullanici.* FROM xeber 
  inner join kullanici on xeber.kullanici_id=kullanici.kullanici_id where xeber.xeber_id=:id");
  $xebersor->execute(array(
    'id' => $_GET['xeber_id']
    ));
 
$xebercek=$xebersor->fetch(PDO::FETCH_ASSOC);

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Xeberi Duzelde bilersen Dostum:) <small>,

              <?php 

              if ($_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>
 
            
            <br />

            <form action="../netting/islem.php" method="POST" enctype="multipart/form-data"  data-parsley-validate class="form-horizontal form-label-left">

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yüklü Logo<br><span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">

                    <?php 
                    if (strlen($xebercek['xeber_sekil'])>0) {?>
                    <img width="400"  src="../../<?php echo $xebercek['xeber_sekil']; ?>">

                    <?php } else {?>


                    <img width="400"  src="../../dimg/logo-yok.png">


                    <?php } ?>

                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Resim Seç<p style="color:red">(Sekili de</p> <p style="color:red">mutleq</p> <p style="color:red">deyismelisiniz)</p> 
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" id="first-name"  name="xeber_sekil"  class="form-control col-md-7 col-xs-12">
                  </div>
                </div>

                <input type="hidden" name="eski_yol" value="<?php echo $xebercek['xeber_sekil']; ?>">
  
               
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Xeberi Yazma Tarixi<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name"  value="<?php echo $xebercek['xeber_zaman'] ?>" disabled="" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Yazan İnsan<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name"  value="<?php echo $xebercek['kullanici_ad']." ". $xebercek['kullanici_soyad']?>" disabled="" class="form-control col-md-7 col-xs-12">
                </div>
              </div> 
 
              <!-- Ck Editör Başlangıç -->

              <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Xeber <span class="required">*</span>
                </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea  class="ckeditor" id="editor1" name="xeber_detay"><?php echo $xebercek['xeber_detay']; ?></textarea>
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

          <!-- Ck Editör Bitiş -->


              <input type="hidden" name="xeber_id" value="<?php echo $xebercek['xeber_id']?>">


              <div class="ln_solid"></div>
              <div class="form-group">
                <div align="right" class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="xeberduzelt" class="btn btn-success">Xeberi yenile Dostum:) </button>
                </div>
              </div>

            </form>



          </div>
        </div>
      </div>
    </div>



    <hr>
    <hr>
    <hr>



  </div>
</div>
<!-- /page content -->

<?php require_once 'footer.php'; ?>
