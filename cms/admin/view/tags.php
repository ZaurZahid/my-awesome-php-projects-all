<?php require_once admin_view('static/header')?>
    <div class="box-">
        <h1>
           Etiketler
            <?php if(permission('tags','add')):?>
              <a href="<?=admin_url('add_tag')?>">Yeni Ekle</a>
            <?php endif?>
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
                <tr>  
                    <th class="hide">Etiket Adi</th>
                    <th class="hide">Kullanim Sayisi</th>   
                    <th>Islemler</th>  
                </tr>
            </thead>
            <tbody>
            <?php foreach($query as $row):?>
                <tr>
                    <td> 
                        <a href="<?= admin_url('edit_tag?id='.$row['tag_id'])?>" class="title">
                          <p><?=$row['tag_name']?></p>
                        </a> 
                    </td>  
                    <td>
                        <?=$row['total']?>
                    </td>
                    <td>
                    <?php if(permission('tags','edit')):?>
                       <a href="<?= admin_url('edit_tag?id='.$row['tag_id'])?>" class="btn">Duzenle</a>
                    <?php endif ?>
                    <?php if(permission('tags','delete')):?>
                         <a onclick="return confirm('Silme islemine davam edirsinizmi?')" href="<?= admin_url('delete?table=tags&column=tag_id&id='.$row['tag_id'])?>" class="btn">Sil</a> 
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