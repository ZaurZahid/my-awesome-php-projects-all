<?php require_once admin_view('static/header')?>

<div class="box-">
        <h1>
            Ayarlar
        </h1>
    </div> 
    <div class="clear" style="height: 10px;"></div> 
    <div class="box-" tab>
        <div class="admin-tab"> 
            <ul tab-list>
                <li>
                    <a href="">Genel</a>
                </li>
                <li>
                    <a href="">Site Modu</a>
                </li>
                <li>
                    <a href="">SMTP Ayarlari</a>
                </li>
                <li>
                    <a href="">Yorum ayarlari</a>
                </li>
                <li>
                    <a href="">Tema ayarlari</a>
                </li>
                <li>
                    <a href="">Footer ayarlari</a>
                </li>
            </ul>
        </div> 
        <form action="" method="POST" class="form label">
            <div class="tab-container">
                <div tab-content>
                    <ul> 
                            <li>
                                <label>Site Title</label>
                                <div class="form-content">
                                    <input type="text" name="settings['title']" value="<?= setting('title')?>">
                                </div>
                            </li>
                        
                            <li>
                                <label>Site Description</label>
                                <div class="form-content">
                                    <input type="text" name="settings['description']" value="<?= setting('description')?>">
                                </div>
                            </li>
            
                            <li>
                                <label>Site Keywords</label>
                                <div class="form-content">
                                    <input type="text" name="settings['keywords']" value="<?= setting('keywords')?>">
                                </div>
                            </li>
                                        
                            <li>
                                <label>Site Temasi</label>
                                <div class="form-content">
                                    <select name="settings['theme']">
                                        <option value="">-Tema sec-</option>
                                        <?php foreach($themes as $theme):?>
                                        <option <?=setting('theme')==$theme ? 'selected' : null ?> value="<?=$theme?>"><?=$theme?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </li>
                    </ul>
                </div>
                <div tab-content>
                    <ul>   
                        <li>
                            <label>Bakim modu acikmi?</label>
                            <div class="form-content">
                                <select name="settings['maintenance_mode']">
                                    <option <?=setting('maintenance_mode')==1 ? 'selected' : null ?> value="1">Evet</option>
                                    <option <?=setting('maintenance_mode')==2 ? 'selected' : null ?> value="2">Hayir</option>

                                </select>
                            </div>
                        </li>
                    
                        <li>
                            <label>Bakim modu title</label>
                            <div class="form-content">
                                <input type="text" name="settings['maintenance_mode_title']" value="<?= setting('maintenance_mode_title')?>">
                            </div>
                        </li>

                        <li>
                            <label>Bakim modu description</label>
                            <div class="form-content">
                            <textarea name="settings['maintenance_mode_description']" id="" cols="30" rows="5"><?= setting('maintenance_mode_description')?></textarea>
                            </div>
                        </li>
                    </ul> 
                </div>
                <div tab-content> 
                    <ul>
                            <li>
                                <label>Smtp host</label>
                                <div class="form-content">
                                <input type="text" name="settings['smtp_host']" value="<?= setting('smtp_host')?>" ">
                                </div>
                            </li>
                            <li>
                                <label>Smtp email</label>
                                <div class="form-content">
                                <input type="text" name="settings['smtp_email']" value="<?= setting('smtp_email')?>" ">
                                </div>
                            </li>
                            <li>
                                <label>Smtp sifreniz</label>
                                <div class="form-content">
                                <input type="text" name="settings['smtp_password']" value="<?= setting('smtp_password')?>" ">
                                </div>
                            </li>
                            <li>
                                <label>Gonderenin <strong style="color:red">EMAIL</strong> adresi</label>
                                <div class="form-content">
                                <input type="text" name="settings['smtp_send_email']" value="<?= setting('smtp_send_email')?>" ">
                                </div>
                            </li>
                            <li>
                                <label>Gonderilenin hakkinda </label>
                                <div class="form-content">
                                <input type="text" name="settings['smtp_send_name']" value="<?= setting('smtp_send_name')?>" ">
                                </div>
                            </li>
                            <li>
                                <label>Smtp port</label>
                                <div class="form-content">
                                <input type="text" name="settings['smtp_port']" value="<?= setting('smtp_port')?>" ">
                                </div>
                            </li>
                            <li>
                                <label>Smtp secure</label>
                                <div class="form-content">
                                    <select name="settings['smtp_secure']">
                                        <option <?=setting('smtp_secure')=="ssl" ? 'selected' : null ?> value="ssl">SSL</option> 
                                        <option <?=setting('smtp_secure')=="tsl" ? 'selected' : null ?> value="tsl">TSL</option>
                                    </select>
                                </div>
                            </li>
                    </ul>
                </div>  
                <div tab-content>
                        <ul>
                            <li>
                                <label>Ziyaretci yorumu</label>
                                <div class="form-content">
                                    <select name="settings['visitor_comment']">
                                    <option value="1"<?=setting('visitor_comment')==1?'selected':null?>>Onayli</option>
                                    <option value="2"<?=setting('visitor_comment')==2?'selected':null?>>Onayli deyil</option> 
                                    </select>
                                </div>
                            </li> 
                            <li>
                                <label>Istifadeci yorumu</label>
                                <div class="form-content">
                                    <select name="settings['user_comment']">
                                    <option value="1"<?=setting('user_comment')==1?'selected':null?>>Onayli</option>
                                    <option value="2"<?=setting('user_comment')==2?'selected':null?>>Onayli deyil</option> 
                                    </select>
                                </div>
                            </li> 
                        </ul>
                </div> 
                <div tab-content>
                    <ul>
                            <li>
                                <label>Logo Basligi</label>
                                <div class="form-content">
                                <input type="text" name="settings['logo']" value="<?= setting('logo')?>" ">
                                </div>
                            </li>
                            <li>
                                <label>Job title</label>
                                <div class="form-content">
                                <input type="text" name="settings['job_title']" value="<?= setting('job_title')?>">
                                </div>
                            </li>
                            <li>
                                <label>Job description</label>
                                <div class="form-content">
                                <textarea name="settings['job_description']" id="" cols="30" rows="5"><?= setting('job_description')?></textarea>
                            </li>
                            <li>
                                <label>Arama placeholder</label>
                                <div class="form-content">
                                <input type="text" name="settings['arama_placeholder']" value="<?= setting('arama_placeholder')?>">
                                </div>
                            </li>
                    </ul> 
                    </div>
                <div tab-content>
                    <ul>
                            <li>
                                <label>Footer hakkinda</label>
                                <div class="form-content">
                                <input type="text" name="settings['footer_about']" value="<?= setting('footer_about')?>" ">
                                </div>
                            </li>
                            <li>
                                <label>Facebook ancaq adinizi yaza bilersiz</label>
                                <div class="form-content">
                                <input type="text" name="settings['facebook']" value="<?= setting('facebook')?>" ">
                                </div>
                            </li>
                            <li>
                                <label>Instagram URL</label>
                                <div class="form-content">
                                <input type="text" name="settings['instagram']" value="<?= setting('instagram')?>" ">
                                </div>
                            </li>
                            <li>
                                <label>Youtube URL</label>
                                <div class="form-content">
                                <input type="text" name="settings['youtube']" value="<?= setting('youtube')?>" ">
                                </div>
                            </li> 
                        </ul>
                </div> 
                <ul> 
                    <input type="hidden" name="submit" value="1"> 
                    <li class="submit">
                        <button type="submit">Ayarlari Kaydet</button>
                    </li> 
               </ul>
        </div>   
            
        </form>
    </div>

<?php require_once admin_view('static/footer')?>