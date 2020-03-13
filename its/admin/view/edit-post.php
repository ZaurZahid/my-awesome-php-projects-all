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
                    <a href="">SEO</a>
                </li> 
            </ul>
        </div> 
          <div class="row">
            <div class="col-md-12">
              <div class="card"> 
              <?php if($error):?>
                  <div class="alert alert-danger"> 
                    <span>
                      <b> Danger - </b> <?=$error?></span>
                  </div>
                <?php endif?>
                <div class="card-body">   Movzu duzenle(<?=$id?>)
                  <form action="" method="POST">
                    <div class="tab-container">
                      <div tab-content>  
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">Sehife Basligi</label>
                              <input type="text"  name="post_title" value="<?= post('post_title') ? post('post_title') : $row['post_title']?>" class="form-control">
                            </div>
                          </div> 
                        </div>
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">Sehife qisa iceriyi</label>
                              <textarea class="form-control short-editor" name="post_short_content" ><?= post('post_short_content') ? post('post_short_content') : $row['post_short_content']?></textarea>
                             </div>
                          </div>
                        </div> 
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">Sehife iceriyi</label>
                              <textarea class="form-control editor" name="post_content" cols="30" rows="5"><?= post('post_content') ? post('post_content') : $row['post_content']?></textarea>
                             </div>
                          </div>
                        </div>  
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">Status</label> 
                                <select name="post_status"> 
                                <option value="1" <?=(post('post_status')?post('post_status'):$row['post_status'])==1 ? 'selected' : null?>>Yayinda</option>
                                <option value="2" <?=(post('post_status')?post('post_status'):$row['post_status'])==2 ? 'selected' : null?>>Yayina hazirlanir(Qaralama)</option>
                                </select> 
                           </div>
                          </div>
                        </div> 
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">Ana Menu</label>
                                <select name="post_menu" style="width: 300px;" multiple="" size="6">
                                  <?php foreach(menu(19) as $menu):$url=ltrim($menu['url'],'/its/');?> 
                                  <option class="form-control" value="<?=$url?>"><?=$menu['title']?>
                                  <?php if($menu['submenu']):?><?php foreach($menu['submenu'] as $submenu):$suburl=ltrim($submenu['url'],'/its/');?>
                                    <option <?=$suburl==$row['post_menu']?'selected':null?> style="color:#d81e55;font-weight:540;" value="<?=$suburl?>">............=><?=$submenu['title']?></option>
                                  <?php endforeach?><?php endif?> 
                                  </option>
                                  <?php endforeach?> 
                                </select> 
                              </div>
                          </div>
                        </div> 
                      </div>
                      
                      <div tab-content> 
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">SEO Url(/its//menu['title']/++++)</label>
                              <input type="text" class="form-control" name="post_url" value="<?= post('post_url') ? post('post_url') : $row['post_url']?> ">
                              <p style="color:blue;font-size:12px">Eger bos qoysan sayfa adini yerine alir.</p>
                            </div>
                          </div> 
                        </div> 
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">Seo title</label>
                              <input type="text"  name="post_seo[title]" value="<?=$seo['title']?>" class="form-control">
                            </div>
                          </div> 
                        </div>
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">SEO description</label>
                              <textarea class="form-control editor" name="post_seo[description]" rows="5"><?=$seo['description']?></textarea>
                            </div>
                          </div>
                        </div> 
                      </div>
                      
                      <button type="submit" name="submit" value="1" class="btn btn-primary pull-right">Gonder</button>
                      <div class="clearfix"></div>
                    </div>
                  </form>
              </div>
            </div> 
          </div>
        </div>
      </div>
<?php require_once admin_view('static/footer')?>
