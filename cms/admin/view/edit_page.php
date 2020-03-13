<?php require_once admin_view('static/header')?>

<div class="box-">
        <h1>
            Sehife duzenle (#<?=$id?>)
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
                            <label>Sehife basligi</label>
                            <div class="form-content">
                                <input type="text" name="page_title" value="<?= post('page_title') ? post('page_title') : $row['page_title']?>">
                            </div>
                        </li> 
                        <li>
                            <label>Sehife iceriyi</label>
                            <div class="form-content">
                              <textarea class="editor" name="page_content" cols="30" rows="5"><?= post('page_content')? post('page_content') : $row['page_content']?></textarea>
                            </div>
                        </li>
                   </ul>
            </div>
            <div tab-content>
                <ul>   
                    <li>
                        <label>SEO url</label>
                        <div class="form-content">
                            <input type="text" name="page_url" value="<?=post('page_url')? post('page_url') : $row['page_url']?>">
                            <p>Eger bos qoysan sayfa adini yerine alir.</p>
                        </div>
                    </li>
 
                    <li>
                        <label>SEO title</label>
                        <div class="form-content">
                            <input type="text" name="page_seo[title]" value="<?= $seo['title']?>">
                        </div>
                    </li>

                    <li>
                        <label>SEO description</label>
                        <div class="form-content">
                        <textarea   name="page_seo[description]" id="" cols="30" rows="5"><?= $seo['description']?></textarea>
                        </div>
                    </li>
                  </ul> 
            </div> 
            <ul> 
                <input type="hidden" name="submit" value="1"> 
                <li class="submit">
                    <button type="submit">Guncelle</button>
                </li> 
           </ul>
      </div>   
          
        </form>
    </div>

<?php require_once admin_view('static/footer')?>