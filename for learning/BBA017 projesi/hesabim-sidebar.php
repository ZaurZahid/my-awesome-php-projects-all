 
 <?php require_once 'header.php';
 islemkontrol ();
 
?>
  <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                            <ul class="settings-title">
                                <li class="active"><a href="javascript:void(0)" > <b>FEALIYYET</b> </a></li>
                                <li><a href="status_ekle?kullanici_statusyazan=<?php echo $_SESSION['userkullanici_id']?>" >Status elave et</a></li>
                                <li><a href="statuslarim" > Statuslarim </a></li>
                                <li><a href="gelen_statuslar" >  Gelen Statuslar </a></li>
                                <li><a href="xeber-ekle" >Xeberler elave et</a></li>
                                <li><a href="xeberler" >Xeberler</a></li> 
                                <li><a href="gelen_mesajlar" >  Gelen Mesajlar </a></li>
                                <li><a href="geden_mesajlar" >  Geden Mesajlar </a></li>

                            </ul>
                                      
                        </div>