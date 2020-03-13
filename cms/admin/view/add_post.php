<?php require_once admin_view('static/header')?>

<div class="box-">
        <h1>
            Movzu ekle
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
                    <a href="">SEO</a>
                </li> 
            </ul>
        </div> 
        <form action="" method="POST" class="form label">
        <div class="tab-container">
            <div tab-content>
                <ul> 
                        <li>
                            <label>Movzu basligi</label>
                            <div class="form-content">
                                <input type="text" name="post_title" value="<?= post('post_title')?>">
                            </div>
                        </li> 
                        <li>
                            <label>Movzu (KISA)iceriyi</label>
                            <div class="form-content">
                              <textarea class="editor-short" name="post_short_content" ><?= post('post_short_content')?></textarea>
                            </div>
                        </li>
                        <li>
                            <label>Movzu iceriyi</label>
                            <div class="form-content">
                              <textarea class="editor" name="post_content" cols="30" rows="5"><?= post('post_content')?></textarea>
                            </div>
                        </li>
                        <li>
                            <label>Movzu Kategorisi</label>
                            <div class="form-content">
                                <select name="post_categories[]" multiple="" size="6">
                                  <?php foreach($categories as $category):?>
                                        <option value="<?=$category['category_id']?>"><?=$category['category_name']?></option>
                                  <?php endforeach?> 
                                </select>
                            </div>
                        </li>
                        <li>
                            <label>Movzu Durumu</label>
                            <div class="form-content">
                                <select name="post_status"> 
                                   <option value="1" <?=post('page_status')==1 ? 'selected' : null?>>Yayinda</option>
                                   <option value="2" <?=post('page_status')==2 ? 'selected' : null?>>Yayina hazirlanir(Qaralama)</option>
                                </select>         
                            </div>
                        </li>
                        <li>
                            <label>Movzu etiketleri</label>
                            <div class="form-content"> 
                              <input name="post_tags" id="tags" class="tagsinput" value="<?= post('post_tags')?>">   
                              <p>Birden cox etiketi alt-alta yazin....</p>
                            </div>
                        </li>
                   </ul>
            </div>
            <div tab-content>
                <ul>   
                    <li>
                        <label>SEO url</label>
                        <div class="form-content">
                            <input type="text" name="post_url" value="<?=post('post_url')?>">
                            <p>Eger bos qoysan movzu baslig adini yerine alir.</p>
                        </div>
                    </li>
 
                    <li>
                        <label>SEO title</label>
                        <div class="form-content">
                            <input type="text" name="post_seo[title]">
                        </div>
                    </li>

                    <li>
                        <label>SEO description</label>
                        <div class="form-content">
                        <textarea  class="editor"  name="post_seo[description]" id="" cols="30" rows="5"></textarea>
                        </div>
                    </li>
                  </ul> 
            </div> 
            <ul> 
                <input type="hidden" name="submit" value="1"> 
                <li class="submit">
                    <button type="submit">Movzuni Kaydet</button>
                </li> 
           </ul>
      </div>   
          
        </form>
    </div>
    <script> 
        var tags=['<?=implode("','",$tagsArr)?>'];
    </script>
<?php require_once admin_view('static/footer')?>