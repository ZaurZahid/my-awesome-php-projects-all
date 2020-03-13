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
                                        <h2 class="title-section"> Siparisleriniz</h2>
                                        <div class="personal-info inner-page-padding"> 
                                        <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Siparis tarixi</th>
                                            <th scope="col">Siparis numarasi</th>
                                             <th scope="col"> Detay</th>

                                          </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                                        
                                            $siparissor=$db->prepare("SELECT * FROM siparis where kullanici_id=:kullanici_id order by siparis_zaman DESC");
                                            $siparissor->execute(array(
                                                'kullanici_id'=>$_SESSION['userkullanici_id']

                                            ));

                                            $say=0;
                                            while($sipariscek=$siparissor->fetch(PDO::FETCH_ASSOC))  { $say++
                                            ?>

                                          <tr>
                                            <th scope="row"><?php echo $say ?> </th>
                                             <td><?php echo $sipariscek['siparis_zaman']?> </td>
                                            <td> <?php echo $sipariscek['siparis_id']?></td>
                                            <td><a href="siparis-detay?siparis_id=<?php echo $sipariscek['siparis_id']?>"> <button class="btn btn-primary btn-xs"> Detay</button></a></td>
 

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