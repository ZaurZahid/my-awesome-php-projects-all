<?php require_once admin_view('static/header')?>
      <!-- End Navbar -->
      
      <div class="content">
        <div class="container-fluid" tab>
        <div class="admin-tab"> 
            <ul tab-list>
                <li>
                    <a href="">Genel</a>
                </li>
                <li>
                    <a href="">Tema ayarlari</a>
                </li>
                <li>
                    <a href="">Site Modu</a>
                </li>
                <li>
                    <a href="">SMTP Ayarlari</a>
                </li>
               <!--    <li>
                    <a href="">Yorum ayarlari</a>
                </li>
               -->
                <li>
                    <a href="">Footer ayarlari</a>
                </li>
            </ul>
        </div> 
          <div class="row">
            <div class="col-md-12">
              <div class="card"> 
                <div class="card-body">  
                  <form action="" method="POST">
                    <div class="tab-container">
                      <div tab-content> 
                        <div class="row"> 
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">Site title</label>
                              <input type="text" name="settings[title]" value="<?=setting('title')?>" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">Site description</label>
                              <input type="text" name="settings[description]"value="<?=setting('description')?>" class="form-control">
                            </div>
                          </div> 
                        </div>
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">Site keywords</label>
                              <input type="text" name="settings[keywords]"value="<?=setting('keywords')?>" class="form-control">
                            </div>
                          </div>
                        </div> 
                      </div>
                      <div tab-content> 
                        <div class="row"> 
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">Static1</label>
                              <input type="text" name="settings[static1]" value="<?= setting('static1')?>" class="form-control">
                            </div>
                          </div>
                        </div>
                        
                        <div class="row"> 
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">Static2</label>
                              <input type="text" name="settings[static2]" value="<?= setting('static2')?>" class="form-control">
                            </div>
                          </div>
                        </div>
                        
                        <div class="row"> 
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">Static3</label>
                              <input type="text" name="settings[static3]" value="<?= setting('static3')?>" class="form-control">
                            </div>
                          </div>
                        </div>
                        
                      </div>
                      </div>
                      <div tab-content> 
                        <div class="row"> 
                          <div class="col-md-2">
                            <div class="form-group">
                              <label class="bmd-label-floating">Bakim modu acikmi?</label>
                              <div class="form-content">
                                <select class="form-control" name="settings[maintenance_mode]">
                                    <option <?=setting('maintenance_mode')==1 ? 'selected' : null ?> value="1">Evet</option>
                                    <option <?=setting('maintenance_mode')==2 ? 'selected' : null ?> value="2">Hayir</option>
                                </select>
                            </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">Bakim modu title</label>
                              <input type="text" name="settings[maintenance_mode_title]" value="<?= setting('maintenance_mode_title')?>" class="form-control">
                            </div>
                          </div> 
                        </div>
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">Bakim modu description</label>
                              <textarea class="form-control" name="settings[maintenance_mode_description]" rows="5"><?= setting('maintenance_mode_description')?></textarea>
                            </div>
                          </div>
                        </div> 
                      </div>
                      <div tab-content> 
                    <ul class="smtp">
                            <li>
                                <label>Smtp host</label>
                                <div class="form-content">
                                <input type="text" name="settings[smtp_host]" value="<?= setting('smtp_host')?>" class="form-control">
                                </div>
                            </li>
                            <li>
                                <label>Smtp email</label>
                                <div class="form-content">
                                <input type="text" name="settings[smtp_email]" value="<?= setting('smtp_email')?>" class="form-control">
                                </div>
                            </li>
                            <li>
                                <label>Smtp sifreniz</label>
                                <div class="form-content">
                                <input type="text" name="settings[smtp_password]" value="<?= setting('smtp_password')?>" class="form-control">
                                </div>
                            </li>
                            <li>
                                <label>Gonderenin <strong style="color:red">EMAIL</strong> adresi</label>
                                <div class="form-content">
                                <input type="text" name="settings[smtp_send_email]" value="<?= setting('smtp_send_email')?>" class="form-control">
                                </div>
                            </li>
                            <li>
                                <label>Gonderilenin hakkinda </label>
                                <div class="form-content">
                                <input type="text" name="settings[smtp_send_name]" value="<?= setting('smtp_send_name')?>" class="form-control">
                                </div>
                            </li>
                            <li>
                                <label>Smtp port</label>
                                <div class="form-content">
                                <input type="text" name="settings[smtp_port]" value="<?= setting('smtp_port')?>" class="form-control">
                                </div>
                            </li>
                            <li>
                                <label>Smtp secure</label>
                                <div class="form-content">
                                    <select name="settings[smtp_secure]">
                                        <option <?=setting('smtp_secure')=="ssl" ? 'selected' : null ?> value="ssl">SSL</option> 
                                        <option <?=setting('smtp_secure')=="tsl" ? 'selected' : null ?> value="tsl">TSL</option>
                                    </select>
                                </div>
                            </li>
                    </ul>
                </div> 
                      <div tab-content> 
                        <div class="row"> 
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">Footer logo</label>
                              <input type="text" name="settings[footer_logo]" value="<?= setting('footer_logo')?>" class="form-control">
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Footer is vaxtlari</label>
                              <input type="text" name="settings[footer_is_vaxtlar]" value="<?= setting('footer_is_vaxtlar')?>" class="form-control">
                              <input type="text" name="settings[footer_is_saatlari]" value="<?= setting('footer_is_saatlari')?>" class="form-control">
                            </div>
                          </div> 
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <label class="bmd-label-floating">Footer istirahet</label>
                              <input type="text" name="settings[footer_is_vaxtlar1]" value="<?= setting('footer_is_vaxtlar1')?>" class="form-control">
                              <input type="text" name="settings[footer_is_vaxtlar2]" value="<?= setting('footer_is_vaxtlar2')?>" class="form-control">
                            </div>
                          </div>
                        </div> 
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">Footer Copyright</label>
                              <input type="text" name="settings[footer_copyright]" value="<?= setting('footer_copyright')?>" class="form-control">
                            </div>
                          </div>
                        </div> 
                      </div>
                      <button type="submit" class="btn btn-primary pull-right">Ayarlari kaydet</button>
                      <div class="clearfix"></div>
                    </div>
                  </form>
              </div>
            </div> 
          </div>
        </div>
      </div>
<?php require_once admin_view('static/footer')?>
