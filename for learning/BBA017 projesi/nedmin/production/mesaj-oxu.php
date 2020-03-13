<?php 

require_once 'header.php'; 

$mesajsor=$db->prepare("SELECT mesaj.*,kullanici.* FROM mesaj
inner join kullanici on mesaj.kullanici_mesajgelen=kullanici.kullanici_id where   mesaj.mesaj_id=:mesaj_id
order by mesaj_zaman DESC");
$mesajsor->execute(array(
 'mesaj_id'=>$_GET['mesaj_id']
));
$mesajcek=$mesajsor->fetch(PDO::FETCH_ASSOC); 

?>

<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Mesaji Oxuya bilersen Dostum:) <small>,

              <?php 

              if ($_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>
 
            
            <br />

            <form action=" " method=" "    data-parsley-validate class="form-horizontal form-label-left">
 
        
            <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Kime<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <h1  style="color:red" >    <?php echo $mesajcek['kullanici_ad']." ".$mesajcek['kullanici_soyad'] ?></h1>
                </div>
              </div>
            
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mesaji Yazma Tarixi<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name"  value="<?php echo $mesajcek['mesaj_zaman'] ?>" disabled="" class="form-control col-md-7 col-xs-12">
                </div>
              </div>
            
              <div class="form-group">
               <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mesaj <span class="required">*</span>
                </label>
               <div class="col-md-6 col-sm-6 col-xs-12">
                  <textarea  class="ckeditor" id="editor1"   disabled=""><?php echo $mesajcek['mesaj_detay']; ?></textarea>
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
