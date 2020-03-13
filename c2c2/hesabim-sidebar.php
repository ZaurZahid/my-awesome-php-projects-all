<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                            <ul class="settings-title">
                                <li class="active"><a href="javascript:void(0)" > <b>UYE ISLEMLERI</b> </a></li>
                                <?php 
                                        if ($kullanicicek['kullanici_magaza']!=2) {?>

                                <li><a href="magaza-basvuru" >Magaza basvuru</a></li>
                                        <?php } ?>
                                <li><a href="siparislerim" >  Siparislerim(Alacaqlarim) </a></li>
                                <li><a href="hesabim" >   Hesab Bilgilerim </a></li>
                                <li><a href="adres-bilgileri" >Adres bilgilerim</a></li>
                                <li><a href="gelen-mesajlar" >Gelen Mesajlar</a></li>
                                <li><a href="geden-mesajlar" >Geden Mesajlar</a></li>
                                <li><a href="sifre-guncelle" >Sifre guncelle</a></li>
                                <li><a href="profil-resim-guncelle " >Profil resim guncelle</a></li>


                            </ul>
                            <?php 
                                        if ($kullanicicek['kullanici_magaza']==2) {?>
                            <hr>
                            
                            <ul class="settings-title">
                                <li class="active"><a href="javascript:void(0)" > <b>MAGAZA ISLEMLERI</b> </a></li>
                                <li><a href="urun-ekle" >Urun ekle</a></li>
                                <li><a href="urunlerim" > Urunlerim </a></li>
                                <li><a href="yeni-siparisler" >Yeni siparisler</a></li>
                                <li><a href="tamamlanmis-siparisler" >Tamamlanan siparisler</a></li> 
                                <li><a href="sifre-guncelle" >  Ayarlar </a></li>

                            </ul>
                                        <?php } ?>
                        </div>