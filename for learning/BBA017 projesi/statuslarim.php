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

                        <?php 

		        		if ($_GET['durum']=="hata") {?>

			        	<div class="alert alert-danger">
			    		<strong>Hata!</strong> Islem basarisiz.
                        </div>
                
                        <?php } else if ($_GET['durum']=="ok") {?>
                         <div class="alert alert-success">
			    		<strong>Bilgi!</strong> Islem basarili..
		        		</div>
					
				 
					
			        	<?php }
				                 ?>


                                 <div class="settings-details tab-content">
                                    <div class="tab-pane fade active in" id="Personal">
                                        <h2 style="color:red" class="title-section">Statuslarin Dostum:)</h2>
                                        <div class="personal-info inner-page-padding"> 
                                        <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Statusun yazilma tarixi</th>
                                            <th scope="col">Statusunuz</th>
                                            <th scope="col"> </th>
                                            <th scope="col"> </th>

                                          </tr>
                                        </thead>
                                        <tbody>
                                  <?php 
                                                        
                                                        $statussor=$db->prepare("SELECT * FROM status where kullanici_id=:kullanici_id order by status_zaman DESC");
                                                        $statussor->execute(array(
                                                            'kullanici_id'=>$_SESSION['userkullanici_id']

                                                        ));

                                                        $say=0;
                                                     while($statuscek=$statussor->fetch(PDO::FETCH_ASSOC))  { $say++
                                                        ?>

                                          <tr>
                                            <th scope="row"><?php echo $say ?> </th> 
                                             <td><?php echo $statuscek['status_zaman']?> </td>
                                            <td> <?php echo substr( $statuscek['status_detay'],0,10) ?> </td>
                                            <td><a href="status_duzelt.php?status_id=<?php echo $statuscek['status_id']?>"> <button class="btn btn-primary btn-xs"> Duzenle</button></a></td>
                                            <td>
                     
                                            <a href="nedmin/netting/adminislem.php?statussil=ok&status_id=<?php echo $statuscek['status_id']?>
                                            &status_sekil=<?php echo $statuscek['status_sekil']?>">   <button class="btn
                                           btn-danger btn-xs">  Sil</button></a>
                                          </td> 
                                          </tr>
                               <?php } ?>
                                        </tbody>
 
                                      </table>
                                     </div> 
                                              
                                         
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
