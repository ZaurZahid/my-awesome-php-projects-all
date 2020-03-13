<?php 

require_once 'header.php'; 

//Belirli veriyi seçme işlemi


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Mesajlarin siyahisi<small>,
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
                <th>#</th>
                  <th>Mesaj Tarixi  </th>
                   <th>Kimden </th>
                  <th>Kime</th>
                  <th>Detay</th>
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 
$mesajsor=$db->prepare("SELECT mesaj.*,kullanici.* FROM mesaj
inner join kullanici on mesaj.kullanici_mesajgonderen=kullanici.kullanici_id
order by mesaj_zaman DESC");
$mesajsor->execute();

 

$say=0;
           while($mesajcek=$mesajsor->fetch(PDO::FETCH_ASSOC)){ $say++ ;?>


                <tr>
                <td><?php echo $say ?></td>
                  <td><?php echo $mesajcek['mesaj_zaman'] ?></td>
                  <td><?php echo $mesajcek['kullanici_ad']." ".$mesajcek['kullanici_soyad']  ?></td>
                  <td> Oxu butonunu basanda goreceksiniz</td> 
                  <td><?php echo $mesajcek['mesaj_detay'] ?></td>
                  <td><center><a href="mesaj-oxu.php?mesaj_id=<?php echo $mesajcek['mesaj_id']; ?>  "><button class="btn btn-info btn-xs">Oxu</button></a></center></td>
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
