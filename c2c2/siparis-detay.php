<?php require_once 'header.php';

islemkontrol ();
?>
           <head>
           <style>
           
           input{
margin-left:20px  !important;

           }
           
           
           
           </style>
           </head>
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
                                        <h2 class="title-section"> <?php echo $_GET['siparis_id'] ?> numarali siparis detayi</h2>
                                        <div class="personal-info inner-page-padding"> 
                                        <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Urun adi</th>
                                            <th scope="col">Satici</th>
                                             <th scope="col"> Fiyat</th>
                                             <th scope="col"> Onay durumu</th>


                                          </tr>
                                        </thead>
                                        <tbody>
                                      
                                        <?php 
                                                      $siparissor=$db->prepare("SELECT urun.*,kullanici.*,siparis.*,siparis_detay.*  FROM siparis
                                                       INNER JOIN siparis_detay ON siparis.siparis_id=siparis_detay.siparis_id INNER JOIN urun ON urun.urun_id=siparis_detay.urun_id
                                                       INNER JOIN kullanici ON kullanici.kullanici_id=siparis_detay.kullanici_idsatici
                                                       where siparis.siparis_id=:siparisim_id ");
                                                      $siparissor->execute(array(
                                                        'siparisim_id' => $_GET['siparis_id']

                                                      ));
 
                                                     
                                                  $sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC);    
                                                       $urun_id=$sipariscek['urun_id'];
                                                       $siparisdetay_onay=$sipariscek['siparisdetay_onay'];
                                                      $siparisdetay_yorum=$sipariscek['siparisdetay_yorum'];                           
                                                      
                                                      

                                                        ?>

                                          <tr>
                                            <th scope="row"><?php echo $say ?> </th>
                                            <td><?php echo $sipariscek['urun_ad']?> </td>
                                            <td> <?php echo $sipariscek['kullanici_ad']. " ".$sipariscek['kullanici_soyad']?></td>
                                            <td> <?php echo $sipariscek['urun_fiyat']?></td>
                                            <td> <?php 
                                            if($sipariscek['siparisdetay_onay']==0){?>
                                           <a href="nedmin/netting/kullanici.php?urunonay=ok&siparisdetay_id=<?php echo $sipariscek['siparisdetay_id']?>&siparis_id=<?php echo $sipariscek['siparis_id']?>">
                                           <button class="btn btn-warning btn-xs">Onayla</button></a>
                                           <?php } elseif ($sipariscek['siparisdetay_onay']==1) {?>
                                         
                                           <button class="btn btn-success btn-xs">Onaylandi</button>
                                     <?php   }  ?></td>
 

                                          </tr>
                                                      
                                        </tbody>
 
                                      </table>


<?php if ($siparisdetay_onay==2 and $siparisdetay_yorum==0) { ?>
    
<!-- yorum ucun start -->

<form action="nedmin/netting/kullanici.php" method="POST" class="form-horizontal" id="personal-info-form">
                                <div class="settings-details tab-content">
                                    <div class="tab-pane fade active in" id="Personal">
                                        <h2 class="title-section">  Yorumla ve Puanla </h2>
                                        <div class="personal-info inner-page-padding"> 
                                       
                                        <div class="form-group">
                                                <label class="col-sm-3 control-label"> Puanla * </label>
                                                <div class="col-sm-9">
                                                <input type="radio" name="yorum_puan" value="1"> 1                                   
                                                <input type="radio" name="yorum_puan" value="2"> 2
                                                <input type="radio" name="yorum_puan" value="3"> 3
                                                <input type="radio" name="yorum_puan" value="4"> 4
                                                <input type="radio" name="yorum_puan" value="5"> 5

<input type="hidden" value="<?php echo $urun_id?>" name="urun_id">
<input type="hidden" value="<?php echo $_GET['siparis_id']?>" name="siparis_id">

                                                 </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                <label class="col-sm-3 control-label"> Yorumunuz * </label>
                                                <div class="col-sm-9">
                                                    <textarea style="height:150px;" class="form-control" name="yorum_detay" required="" placeholder="Yorumunuzu daxil edin...."   type="text"></textarea>
                                                </div>
                                            </div>
                                           
                                            <div class="form-group">
                                                 <div align="right" class="col-sm-12">
                                                   <button  class="update-btn" name="puanyorumekle" type="submit" id="login-update"> Yorumu ve Puani Kaydet   </button>

                                                 </div>
 
                                            </div>                                        
                                        </div> 
                                    </div> 

                
                                </div> 
  </form> 
 <!-- yorum finish -->
<?php }  else if ($siparisdetay_onay==2 and $siparisdetay_yorum==1) { ?>

<p>Bu detaya yorum verildi Dostum :) </p>


<?php } ?>
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