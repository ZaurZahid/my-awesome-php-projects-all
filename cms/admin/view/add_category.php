<?php require_once admin_view('static/header')?>

<div class="box-">
        <h1>
            Kategoriler
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
                            <label>Kategori adi</label>
                            <div class="form-content">
                                <input type="text" name="category_name" value="<?= post('category_name')?>">
                            </div>
                        </li>
                     
                                    <!--                        <li>
                            <label>Kategori url</label>
                            <div class="form-content">
                                <input type="text" name="category_url" value="<?= post('category_uel')?>">
                            </div>
                        </li>

                        <li>
                            <label>Kategori template</label>
                            <div class="form-content">
                                <input type="text" name="category_template" value="<?= post('category_template')?>">
                            </div>
                        </li>
                               -->
                         
                   </ul>
            </div>
            <div tab-content>
                <ul>   
                    <li>
                        <label>SEO url</label>
                        <div class="form-content">
                            <input type="text" name="category_url" value="<?=post('category_url')?>">
                            <p>Eger bos qoysan kategori adini yerine alir.</p>
                        </div>
                    </li>
 
                    <li>
                        <label>SEO title</label>
                        <div class="form-content">
                            <input type="text" name="category_seo[title]">
                        </div>
                    </li>

                    <li>
                        <label>SEO description</label>
                        <div class="form-content">
                        <textarea name="category_seo[description]" id="" cols="30" rows="5"></textarea>
                        </div>
                    </li>
                  </ul> 
            </div> 
            <ul> 
                <input type="hidden" name="submit" value="1"> 
                <li class="submit">
                    <button type="submit">Kategorileri Kaydet</button>
                </li> 
           </ul>
      </div>   
          
        </form>
    </div>

<?php require_once admin_view('static/footer')?>