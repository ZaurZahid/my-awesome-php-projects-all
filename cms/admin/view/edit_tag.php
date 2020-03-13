<?php require_once admin_view('static/header')?>

<div class="box-">
        <h1>
            Tag duzenle (#<?=$id?>)
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
                            <label>Etiket Adi</label>
                            <div class="form-content">
                                <input type="text" name="tag_name" value="<?= post('tag_name') ? post('tag_name') : $row['tag_name']?>">
                            </div>
                        </li>  
                   </ul>
            </div>
            <div tab-content>
                <ul>   
                    <li>
                        <label>SEO url</label>
                        <div class="form-content">
                            <input type="text" name="tag_url" value="<?=post('tag_url')? post('tag_url') : $row['tag_url']?>">
                            <p>Eger bos qoysan tag adini yerine alir.</p>
                        </div>
                    </li>
 
                    <li>
                        <label>SEO title</label>
                        <div class="form-content">
                            <input type="text" name="tag_seo[title]" value="<?= $seo['title']?>">
                        </div>
                    </li>

                    <li>
                        <label>SEO description</label>
                        <div class="form-content">
                        <textarea   name="tag_seo[description]" id="" cols="30" rows="5"><?= $seo['description']?></textarea>
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