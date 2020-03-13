<?php 

require_once 'header.php'; 

//Belirli veriyi seçme işlemi

$statussor=$db->prepare("SELECT status.*,kullanici.* FROM status
inner join kullanici on status.kullanici_statusyazan=kullanici.kullanici_id ");
$statussor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Statuslarin siyahisi<small>,
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
                  <th>Giris tarixi</th>
                  <th>Ad</th>
                  <th>Soyad</th>
                  <th>Status Sekili</th>
                  <th>Detay</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                while($statuscek=$statussor->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>
                  <td><?php echo $statuscek['status_zaman'] ?></td>
                  <td><?php echo $statuscek['kullanici_ad'] ?></td>
                  <td><?php echo $statuscek['kullanici_soyad'] ?></td>
                  <td><img width="120" height="80" src="../../<?php echo $statuscek['status_sekil'] ?>"></td>
                  <td><?php echo $statuscek['status_detay'] ?></td>
                  <td><center><a href="status-duzenle.php?status_id=<?php echo $statuscek['status_id']; ?>"><button class="btn btn-info btn-xs">Düzenle</button></a></center></td>
                  <td><center><a href="../netting/islem.php?status_id=<?php echo $statuscek['status_id']; ?>&statussil=ok&status_sekil=<?php echo $statuscek['status_sekil']?>"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
