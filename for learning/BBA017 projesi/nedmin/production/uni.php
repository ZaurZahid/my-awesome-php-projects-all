<?php 

require_once 'header.php'; 

//Belirli veriyi seçme işlemi
$unisor=$db->prepare("SELECT * FROM uni");
$unisor->execute();


?>


<!-- page content -->
<div class="right_col" role="main">
  <div class="">

    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Universitet Detallari<small>

             <a href="uni_ekle.php"><button  class="btn btn-success  ">Yeni Ekle</button></a>


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
                  <th>Resim</th>
                  <th>Basliq</th>
                  <th>Aciqlama</th> 
                  <th></th>
                  <th></th>
                </tr>
              </thead>

              <tbody>

                <?php 

                while($unicek=$unisor->fetch(PDO::FETCH_ASSOC)) {?>


                <tr>
                  <td><img width="200" height="170" src="../../<?php echo $unicek['uni_sekil'] ?>"></td>
                  <td><?php echo $unicek['uni_basliq'] ?></td>
                  <td><?php echo substr($unicek['uni_detay'],0,100) ?></td> 
                  <td><center><a href="uni_duzenle.php?uni_id=<?php echo $unicek['uni_id']; ?>"><button class="btn btn-info btn-xs">Düzenle</button></a></center></td>
                  <td><center><a href="../netting/islem.php?uni_id=<?php echo $unicek['uni_id']; ?>&unisil=ok&uni_sekil=<?php echo $unicek['uni_sekil']; ?>"><button class="btn btn-danger btn-xs">Sil</button></a></center></td>
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
