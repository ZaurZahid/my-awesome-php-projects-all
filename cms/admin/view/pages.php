<?php require_once admin_view('static/header')?>
    <div class="box-">
        <h1>
           Sehifeler
            <?php if(permission('pages','add')):?>
              <a href="<?=admin_url('add_page')?>">Yeni Ekle</a>
            <?php endif?>
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
                <tr>  
                    <th class="hide">Baslig</th>
                    <th class="hide">Yazilma tarixi</th>
                    <th>Islemler</th> 
                </tr>
            </thead>
            <tbody>
            <?php foreach($query as $row):?>
                <tr>
                    <td> 
                        <a href="<?= admin_url('edit_page?id='.$row['user_id'])?>" class="title">
                          <p><?=$row['page_title']?></p>
                        </a> 
                    </td> 
                    <td class="hide" title="<?=$row['page_date']?>">
                        <?=timeConvert($row['page_date'])?> 
                    </td> 
                    <td>
                    <?php if(permission('pages','edit')):?>
                         <a href="<?=site_url('sayfa/'.$row['page_url'])?>" class="btn" target="_blank">Goruntule</a>
                         <a href="<?= admin_url('edit_page?id='.$row['page_id'])?>" class="btn">Duzenle</a>
                    <?php endif ?>
                    <?php if(permission('pages','delete')):?>
                         <a onclick="return confirm('Silme islemine davam edirsinizmi?')" href="<?= admin_url('delete?table=pages&column=page_id&id='.$row['page_id'])?>" class="btn">Sil</a> 
                    <?php endif ?>
                    </td>
                </tr>
           <?php endforeach?>
              
            </tbody>
        </table>
    </div>
   <?php if($totalRecord > $pageLimit):?>
        <div class="pagination">
            <ul>
            <?=$db->showPagination(admin_url(route(1)).'?'.$pageParam.'=[page]');?>
            </ul>
        </div>
  <?php endif?>
<?php require_once admin_view('static/footer')?>