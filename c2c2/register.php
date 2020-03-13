﻿<?php require_once 'header.php'?>

           
            <!-- Inner Page Banner Area Start Here -->
            <div class="pagination-area bg-secondary">
                <div class="container">
                    <div class="pagination-wrapper">
                        <ul>
                            <li><a href="index.htm">Home</a><span> -</span></li>
                            <li>Registration</li>
                        </ul>
                    </div>
                    
			        	<?php 

                        if ($_GET['durum']=="farklisifre") {?>

                        <div class="alert alert-danger">
                            <strong>Hata!</strong> Girdiğiniz şifreler eşleşmiyor.
                        </div>
                            
                        <?php } elseif ($_GET['durum']=="eksiksifre") {?>

                        <div class="alert alert-danger">
                            <strong>Hata!</strong> Şifreniz minimum 6 karakter uzunluğunda olmalıdır.
                        </div>
                            
                        <?php } elseif ($_GET['durum']=="mukerrerkayit") {?>

                        <div class="alert alert-danger">
                            <strong>Hata!</strong> Bu kullanıcı daha önce kayıt edilmiş.
                        </div>
                            
                        <?php } elseif ($_GET['durum']=="basarisiz") {?>

                        <div class="alert alert-danger">
                            <strong>Hata!</strong> Kayıt Yapılamadı Sistem Yöneticisine Danışınız.
                        </div>
                            
                        <?php }
                        ?>



                </div>  
            </div> 
            <!-- Inner Page Banner Area End Here -->          
            <!-- Registration Page Area Start Here -->
            <div class="registration-page-area bg-secondary section-space-bottom">
                <div class="container">
                    <h2 class="title-section">Registration</h2>
                    <div class="registration-details-area inner-page-padding">
                        <form action="nedmin/netting/kullanici.php" method="POST" id="personal-info-form">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                                          
                                        <div class="form-group">
                                            <label class="control-label" for="first-name">Emailiniz*</label>
                                            <input type="text" id="first-name"name="kullanici_mail" class="form-control">
                                        </div>
                                </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                                        <div class="form-group">
                                            <label class="control-label" for="first-name">Adiniz*</label>
                                            <input type="text" id="first-name"name="kullanici_ad" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                                        <div class="form-group">
                                            <label class="control-label" for="last-name">Soyadiniz *</label>
                                            <input type="text" id="last-name"name="kullanici_soyad" class="form-control">
                                        </div>
                                    </div>
                          </div>
                         
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                                    <div class="form-group">
                                        <label class="control-label" for="email">Sifreniz *</label>
                                        <input type="text" id="email"name="kullanici_passwordone" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">                                          
                                    <div class="form-group">
                                        <label class="control-label" for="phone">Sifreniz(tekrar) *</label>
                                        <input type="text" id="phone"name="kullanici_passwordtwo" class="form-control">
                                    </div>
                                </div>
                            </div>                                  
                           
                            <div class="row">
                              
                                 <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">                                           
                                    <div class="pLace-order">
                                        <button class="update-btn disabled" type="submit" name="musterikaydet">Submit</button>
                                    </div>
                                </div>
                            </div> 
                        </form>                      
                    </div> 
                </div>
            </div>
            <!-- Registration Page Area End Here -->
            <?php require_once 'footer.php'?>
