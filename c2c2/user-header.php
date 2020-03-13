      <div class="col-lg-9 col-md-8 col-sm-8 col-xs-12 col-lg-push-3 col-md-push-4 col-sm-push-4">
                        <div class="inner-page-main-body">
                            <div class="single-banner">
                                <img src="img\banner\1.jpg" alt="product" class="img-responsive">
                            </div>
                            <div class="author-summery">
                                <div class="single-item">
                                    <div class="item-title">Bolge:</div>
                                    <div class="item-details"><?php echo $kullanicicek['kullanici_il']." / ". $kullanicicek['kullanici_ilce']?></div>
                                </div>
                                <div class="single-item">
                                    <div class="item-title">Giris tarixi:</div>
                                    <div class="item-details"><?php echo $kullanicicek['kullanici_zaman']?></div>
                                </div>
                                <div class="single-item">
                                    <div class="item-title">Profil Xali:</div>
                                    <div class="item-details">
                                    <?php
                                        $puansay=$db->prepare("SELECT COUNT(yorumlar.yorum_puan) as say ,sum(yorumlar.yorum_puan) as topla ,
                                        yorumlar.*,urun.* from yorumlar 
                                        inner join urun on urun.urun_id=yorumlar.urun_id where urun.kullanici_id=:id");

                                       $puansay->execute(array(
                                      'id'=> $_GET['kullanici_id']
                                        ));

                                      $puancek=$puansay->fetch(PDO::FETCH_ASSOC);
                                        
                                       $cavab=$puancek['topla']/$puancek['say']
                                        ?>   

                                        <ul class="default-rating">
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            <li>(<span> <?php echo $cavab ?></span> )</li>
                                        </ul>
                                    </div>
                                </div>
                                <div align="center" class="single-item">
                                    <div class="item-title">Toplam satis:</div>
                                    <div  class="item-name">
                                    <?php
                                        $urunsay=$db->prepare("SELECT COUNT(kullanici_idsatici) as say from siparis_detay where kullanici_idsatici=:id");
                                       $urunsay->execute(array(
                                      'id'=> $_GET['kullanici_id']
                                        ));

                                      $saycek=$urunsay->fetch(PDO::FETCH_ASSOC);
                                       echo $saycek['say'];
                                        ?>
                                     
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>