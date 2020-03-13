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
                <div class="card-body">  
                  <form action="" method="POST">
                    <div class="tab-container">
                      <div tab-content>  
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">Sehife Basligi</label>
                              <input type="text"  name="page_title" value="<?= post('page_title')?>" class="form-control">
                            </div>
                          </div> 
                        </div>
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">Sehife iceriyi</label>
                              <textarea class="form-control editor" name="page_content" cols="30" rows="5"><?= post('page_content')?></textarea>
                             </div>
                          </div>
                        </div> 
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">Ana Menu</label>
                              <select name="page_menu" multiple="" size="6">
                                  <?php foreach(menu(19) as $menu):?>
                                  <option <?=$row['page_menu']==permalink($menu['title']) ? 'selected':null?> class="form-control" value="<?=$menu['title']?>"><?=$menu['title']?></option>
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
                              <label class="bmd-label-floating">SEO Url(/sayfa/++++)</label>
                              <input type="text" class="form-control" name="page_url" value="<?=post('page_url')?>">
                              <p style="color:blue;font-size:12px">Eger bos qoysan sayfa adini yerine alir.</p>
                            </div>
                          </div> 
                        </div> 
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">Seo title</label>
                              <input type="text"  name="page_seo[title]" class="form-control">
                            </div>
                          </div> 
                        </div>
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                              <label class="bmd-label-floating">SEO description</label>
                              <textarea class="form-control editor" name="page_seo[description]" rows="5"></textarea>
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
