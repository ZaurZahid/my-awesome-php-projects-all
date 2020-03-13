<?php require_once 'header.php';
 
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
                                        <h2 style="color:red" class="title-section">Xeberlerin Dostum:)</h2>
                                        <div class="personal-info inner-page-padding"> 
                                        <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Xeberin yazilma tarixi</th>
                                            <th scope="col">Xeberiniz</th>
                                            <th scope="col"> </th>
                                            <th scope="col"> </th>

                                          </tr>
                                        </thead>
                                        <tbody>
                                  <?php 
                                                        
                                                        $xebersor=$db->prepare("SELECT * FROM xeber where kullanici_id=:kullanici_id order by xeber_zaman DESC");
                                                        $xebersor->execute(array(
                                                            'kullanici_id'=>$_SESSION['userkullanici_id']

                                                        ));

                                                        $say=0;
                                                     while($xebercek=$xebersor->fetch(PDO::FETCH_ASSOC))  { $say++
                                                        ?>

                                          <tr>
                                            <th scope="row"><?php echo $say ?> </th> 
                                             <td><?php echo $xebercek['xeber_zaman']?> </td>
                                            <td> <?php echo substr( $xebercek['xeber_detay'],0,49) ?> </td>
                                            <td><a href="xeber_duzelt.php?xeber_id=<?php echo $xebercek['xeber_id']?>"> <button class="btn btn-primary btn-xs"> Duzenle</button></a></td>
                                            <td>
                     
                                            <a href="nedmin/netting/adminislem.php?xebersil=ok&xeber_id=<?php echo $xebercek['xeber_id']?>
                                            &xeber_sekil=<?php echo $xebercek['xeber_sekil']?>">   <button class="btn
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
