<?php require_once 'header.php';

islemkontrol ();
?>
           
            <!-- Inner Page Banner Area Start Here -->
            <div class="pagination-area bg-secondary">
                <div class="container">
                    <div class="pagination-wrapper">
                       
                    </div>
                </div>  
            </div> 
            <!-- Inner Page Banner Area End Here -->          
            <!-- Settings Page Start Here -->
            <div class="settings-page-area bg-secondary section-space-bottom">
                <div class="container">
                    <div class="row settings-wrapper">

                      <?php require_once 'hesabim-sidebar.php';?>
                    
                        <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
 


                                 <div class="settings-details tab-content">
                                    <div class="tab-pane fade active in" id="Personal">
                                        <h2 class="title-section"> Yeni Siparislerim</h2>
                                        <div class="personal-info inner-page-padding"> 
                                        <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Siparis tarixi</th>
                                            <th scope="col">Siparis numarasi</th>
                                            <th scope="col">Urun ad</th>
                                            <th scope="col">Alici</th>
                                            <th scope="col">Urun fiyat</th>
                                             <th scope="col"> Durum</th>

                                          </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                                        
                                                        $siparissor=$db->prepare("SELECT kullanici.*,siparis.*,siparis_detay.*,urun.*
                                                          FROM siparis  inner join siparis_detay on siparis_detay.siparis_id=siparis.siparis_id
                                                          inner join kullanici on kullanici.kullanici_id=siparis_detay.kullanici_id
                                                          inner join urun on urun.urun_id=siparis_detay.urun_id
                                                          where siparis.kullanici_idsatici=:kullanici_idsatici
                                                          and siparis_detay.siparisdetay_onay=:siparisdetay_onay or siparis_detay.siparisdetay_onay=:siparisdetay_onays 
                                                          order by siparis_zaman DESC");
                                                          $siparissor->execute(array(
                                                            'kullanici_idsatici'=> $_SESSION['userkullanici_id'],
                                                            'siparisdetay_onay'=> 0,
                                                            'siparisdetay_onays'=> 1
                                                            
                                                        ));

                                                        $say=0;
                                                     while($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC))  { $say++
                                                        ?>

                                          <tr>
                                            <th scope="row"><?php echo $say ?> </th>
                                             <td><?php echo $sipariscek['siparis_zaman']?> </td>
                                            <td> <?php echo $sipariscek['siparis_id']?></td>
                                            <td> <?php echo $sipariscek['urun_ad']?></td>
                                            <td> <?php echo $sipariscek['kullanici_ad']." ".$sipariscek['kullanici_soyad']?></td>
                                            <td> <?php echo $sipariscek['urun_fiyat']?></td>

                                            <td> <?php 
                                            if($sipariscek['siparisdetay_onay']==1){?>

                                           <a href="nedmin/netting/kullanici.php?urunteslimet=ok&siparisdetay_id=<?php echo $sipariscek['siparisdetay_id']?>&siparis_id=<?php echo $sipariscek['siparis_id']?>">
                                           <button class="btn btn-warning btn-xs">Teslim et</button></a>
 
                                           <?php } elseif ($sipariscek['siparisdetay_onay']==0) {?>
                                           <button class="btn btn-danger btn-xs">Alicinin Teslim etmesi gozlenilir</button>
                                     <?php   }  ?></td>
 


  

                                          </tr>
                                                     <?php } ?>
                                        </tbody>
 
                                      </table>
                                     </div> 
                                    </div> 

                
                                </div> 

                            </form> 
                        </div>  
                    </div>  
                </div>  
            </div> 
            <!-- Settings Page End Here -->
            <?php require_once 'footer.php';?>
<script type="text/javascript">
 
</script>