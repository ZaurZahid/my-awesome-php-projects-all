<?php require_once 'header.php';
  islemkontrol ();
  
 $statussor=$db->prepare("SELECT status.*,kullanici.* FROM status
 inner join kullanici on status.kullanici_statusyazan=kullanici.kullanici_id where kullanici.kullanici_id=:id
 and status.status_id=:status_id
 order by status_zaman DESC");
 $statussor->execute(array(
 'id'=>$_GET['kullanici_statusyazan'],
 'status_id'=>$_GET['status_id']
));
$statuscek=$statussor->fetch(PDO::FETCH_ASSOC); 
if ($statuscek['status_oxunma']==0) {
    $oxunmaduzelt=$db->prepare("UPDATE status set
    status_oxunma=:m 
    where status_id={$_GET['status_id']}");
    
    $update=$oxunmaduzelt->execute(array(
        'm'=>1 
    ));
}





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


                            <form action="nedmin/netting/kullanici.php" method="POST"   class="form-horizontal" id="personal-info-form">
                                <div class="settings-details tab-content">
                                    <div class="tab-pane fade active in" id="Personal">
                                        <h2 style="color:red" class="title-section">Gelen Status Dostum:)</h2>
                                        <div class="personal-info inner-page-padding"> 
                                              
       
                                        <div class="form-group">
                                                <label class="col-sm-3 control-label">Status Detayi*</label>
                                                <div class="col-sm-9">
                                                <p><?php echo $statuscek['status_detay']?></p>
                                            </div>
                                            </div> 
                                            <?php if ($_GET['gedenstatus']!==ok) {?>
                                               
                                            

                                        <div class="form-group">
                                                <label class="col-sm-3 control-label">Statusun Sekili*</label>
                                                <div class="col-sm-9">
                                                        <img src="<?php echo $statuscek['status_sekil']?>" alt="">
                                                </div>
                                            </div> 
                                            
                                           
       
              <input type="hidden" name="kullanici_statusgelen" value="<?php echo $_GET['kullanici_statusgonderen'] ?>">
                                            
 
                                            </div>
                                        <?php }?>                                       
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
