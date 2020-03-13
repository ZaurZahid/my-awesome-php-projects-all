<?php 

require_once 'header.php'; 

//Belirli veriyi seçme işlemi

$xebersor=$db->prepare("SELECT xeber.*,kullanici.* FROM xeber
inner join kullanici on xeber.kullanici_id=kullanici.kullanici_id ");
$xebersor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Xeberlarin siyahisi<small>,
               <?php 

              if ($_GET['durum']=="ok") {?>

              <b style="color:green;">İşlem Başarılı...</b>

              <?php } elseif ($_GET['durum']=="no") {?>

              <b style="color:red;">İşlem Başarısız...</b>

              <?php }

              ?>


            </small></h2>
             
            <div class="clearfix"></div>
          </div>
          <div class="x_content">


            <!-- Div İçerik Başlangıç -->

            <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
              <thead>
                <tr style="color:red; ">
                  <th>Yazilma tarixi</th>
                  <th>Yazan Sexs</th>
              
                  <th>Xeber Sekili</th>
                  <th>Detay</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                while($xebercek=$xebersor->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>
                  <td><?php echo $xebercek['xeber_zaman'] ?></td>
                  <td><?php echo $xebercek['kullanici_ad']." ".$xebercek['kullanici_soyad'] ?></td>
                   <td><img width="120" height="80" src="../../<?php echo $xebercek['xeber_sekil'] ?>"></td>
                  <td><?php echo substr($xebercek['xeber_detay'],0,100) ?></td>
                  <td><center><a href="xeber-duzenle.php?xeber_id=<?php echo $xebercek['xeber_id']; ?>"><button class="btn btn-info btn-xs">Düzenle</button></a></center></td>
                  <td><center><a href="../netting/islem.php?xeber_id=<?php echo $xebercek['xeber_id']; ?>&xebersil=ok&xeber_sekil=<?php echo $xebercek['xeber_sekil']?>"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
                </tr>



                <?php  }

                ?>


              </tbody>
            </table>

            <!-- Div İçerik Bitişi -->


          </div>
        </div>
      </div>
    </div>




  </div>
</div>
<!-- /page content -->

<?php require_once 'footer.php'; ?>
