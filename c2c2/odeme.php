<?php require_once 'header.php';

$urunsor=$db->prepare("SELECT urun.*,kullanici.* FROM urun inner join kullanici on urun.kullanici_id=kullanici.kullanici_id where urun_id=:urun_id and urun_durum=:urun_durum order by urun_zaman DESC");
$urunsor->execute(array(
    'urun_durum'=> 1,
    'urun_id'=>$_POST['urun_id']
    
));
$uruncek=$urunsor->fetch(PDO::FETCH_ASSOC);
 
?>

            <!-- Main Banner 1 Area Start Here -->
            <div class="inner-banner-area">
                <div class="container">
                    <div class="inner-banner-wrapper">
                    <h1 style="color:white;"> <?php echo $uruncek['urun_ad'];?> </h1>
                         
                    </div>
                </div>
            </div>
            <!-- Main Banner 1 Area End Here --> 
            <!-- Inner Page Banner Area Start Here -->
            <div class="pagination-area bg-secondary">
                <div class="container">
                    <div class="pagination-wrapper">
                        
                    </div>
                </div>  
            </div> 
            <!-- Inner Page Banner Area End Here -->          
            <!-- Product Details Page Start Here -->
            <div class="product-details-page bg-secondary">                
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="inner-page-main-body">
                                <div class="single-banner">
                                <table id="cart" class="table table-hover table-condensed">
    				<thead>
						<tr>
							<th style="width:50%">Urun adi</th>
							<th style="width:10%">Qiymet</th>
 							<th style="width:22%" class="text-center">Satici</th>
							<th style="width:10%"></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td data-th="Product">
								<div class="row">
									<div class="col-sm-2 hidden-xs"><img style="width:63px;height:63px;" src="<?php echo $uruncek['urunfoto_resimyol'];?>" alt="<?php echo $uruncek['urun_ad'];?>" class="img-responsive"/></div>
									<div class="col-sm-10">
										<h4 class="nomargin"><?php echo $uruncek['urun_ad'];?></h4>
										<p><?php echo mb_substr($uruncek['urun_detay'],0,100,'UTF-8');?></p>
									</div>
								</div>
							</td>
							<td data-th="Price"><?php echo $uruncek['urun_fiyat'];?>Azn</td>
 								 
							 
							<td data-th="Subtotal" class="text-center"><?php echo $uruncek['kullanici_ad']."-".$uruncek['kullanici_soyad'] ?></td>
 
						</tr>
					</tbody>
					<tfoot>
						<tr class="visible-xs">
 						</tr>
						<tr>
							<td><button  onclick="geridon()" class="btn btn-warning"><i class="fa fa-angle-left"></i>Geri Don</button></td>
							<td colspan="2" class="hidden-xs"></td>


                            <form action="nedmin/netting/kullanici.php" method="POST">
                            <input type="hidden" name="kullanici_idsatici" value="<?php echo $uruncek['kullanici_id']?>">
                            <input type="hidden" name="urun_id" value="<?php echo $uruncek['urun_id']?>">
                            <input type="hidden" name="urun_fiyat" value="<?php echo $uruncek['urun_fiyat']?>">

 							   <td><button type="submit" name="sipariskaydet" class="btn btn-success btn-block">Siparisi tamamla<i class="fa fa-angle-right"></i></button></td>
					
                            </form>


                    	</tr>
					</tfoot>
				</table>

                                 </div>                                
                               
     
                               
                            </div>
                        </div>
                         
                </div>
            </div>
            <!-- Product Details Page End Here -->
            <?php require_once 'footer.php';?>



            <script type="text/javascript">
            
            function geridon(){

                window.history.back();
            }
            </script>
