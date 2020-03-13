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
                                        <h2 class="title-section"> Gelen Mesajlar</h2>
                                        <div class="personal-info inner-page-padding"> 
                                        <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Mesaj tarixi</th>
                                            <th scope="col">Gonderen</th>
                                            <th scope="col">Durum </th>
                                            <th scope="col">Detay</th>
                                            <th></th>

                                          </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                                        
                                                        $mesajsor=$db->prepare("SELECT mesaj.*, kullanici.* FROM mesaj  inner join kullanici on mesaj.kullanici_gonderen=kullanici.kullanici_id
                                                        where mesaj.kullanici_gelen=:id  order by mesaj_zaman DESC");
                                                        $mesajsor->execute(array(
                                                        'id' => $_SESSION['userkullanici_id']

                                                        ));

                                                        $say=0;
                                                     while($mesajcek=$mesajsor->fetch(PDO::FETCH_ASSOC))  { $say++;

                                                    $kullanici_gonderen=$mesajcek['kullanici_gonderen'];

                                                        ?>

                                          <tr>
                                            <th scope="row"><?php echo $say ?> </th>
                                             <td><?php echo $mesajcek['mesaj_zaman']?> </td>
                                            <td> <?php echo $mesajcek['kullanici_ad']." ".$mesajcek['kullanici_soyad'] ?></td>
                                            <td>
                                            <?php if ($mesajcek['mesaj_okunma']==0) {?>
                                            <i style="color:red" class="fa fa-circle" aria-hidden="true"></i> 
                                               <?php  } else { ?>
                                                <i  style="color:green" class="fa fa-circle" aria-hidden="true"></i> 
                                                <?php } ?>
                                            
                                             </td>
                                            <td><a href="mesaj-detay?mesaj_id=<?php echo $mesajcek['mesaj_id']?>&kullanici_gonderen=<?php echo $mesajcek['kullanici_gonderen']?>"> 
                                            <button class="btn btn-primary btn-xs"> Oxu</button></a></td>
                 
                                            <td> <a onclick="return confirm('Silmek isteyirsiniz?')" href="nedmin/netting/kullanici.php?gelenmesajsil=ok&mesaj_id=<?php echo $mesajcek['mesaj_id']?>">   
                                            <button class="btn btn-danger btn-xs">  Sil</button></a></td>

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