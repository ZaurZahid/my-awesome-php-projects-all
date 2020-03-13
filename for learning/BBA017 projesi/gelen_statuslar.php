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
                                        <h2 style="color:red" class="title-section">Gelen Statuslariniz Dostum:)</h2>
                                        <div class="personal-info inner-page-padding"> 
                                        <table class="table table-striped">
                                        <thead>
                                          <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Status tarixi </th>
                                            <th scope="col">Yazan</th>
                                            <th scope="col"> Durum</th>
                                            <th scope="col"></th>
                                            <th scope="col"> </th>

                                          </tr>
                                        </thead>
                                        <tbody>
                               
                                        <?php 
$statussor=$db->prepare("SELECT status.*,kullanici.* FROM status
 inner join kullanici on status.kullanici_statusyazan=kullanici.kullanici_id
 order by status_zaman DESC");
$statussor->execute();


$say=0;
while($statuscek=$statussor->fetch(PDO::FETCH_ASSOC)){ $say++ ;
    $kullanici_statusgonderen=$statuscek['kullanici_statusgonderen'];
      
?>

 <tr>
         <?php if ($_SESSION['userkullanici_id']==$statuscek['kullanici_statusyazan']) {?>
     
  <?php  } else { ?>
                                              <th scope="row"><?php echo $say ?> </th> 
                                              <td><?php echo $statuscek['status_zaman']?> </td>
                                              <td> <?php echo  $statuscek['kullanici_ad']." ".$statuscek['kullanici_soyad']?> </td>
                                             <?php if ($statuscek['status_oxunma']==0) {?>
                                              <td><i style="color:red" class="fa fa-circle" aria-hidden="true"></td>
                                             <?php  } else { ?>
                                             <td><i style="color:green" class="fa fa-circle" aria-hidden="true"></td>
                                            <?php } ?>

  
                                            <td><a href="status_detay.php?status_id=<?php echo $statuscek['status_id']?>&kullanici_statusyazan=<?php echo $statuscek['kullanici_statusyazan']?>">
                                             <button class="btn btn-primary btn-xs"> Oxu</button></a></td>
                                            <td>
                                            <a href="nedmin/netting/kullanici.php?gelenstatussil=ok&status_id=<?php echo $statuscek['status_id']?>
                                            ">   <button type="submit" class="btn btn-danger btn-xs">  Sil</button></a>
 <?php  }?>


                                        
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
