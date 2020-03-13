<?php require_once admin_view('static/header')?>
    <div class="box-">
        <h1>
            Kategoriler
            <?php if(permission('categories','add')):?>
            <a href="<?=admin_url('add_category')?>">Yeni Ekle</a>  
            <?php endif?>
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Kategori Adi</th> 
                    <th class="hide">Eklenme tarixi</th>
                    <th>Islemler</th> 
                </tr>
            </thead>
            <tbody class="table-sortable" data-table="categories" data-where="category_id" data-column="category_sira">
            <?php foreach($query as $row):?>
                <tr id="id_<?=$row['category_id']?>">
                    <td>
                        <a href="<?= admin_url('edit_category?id='.$row['category_id'])?>" class="title">
                           <?=$row['category_name']?>
                        </a> 
                    </td>  
                    <td class="hide">
                        <?=timeConvert($row['category_date'])?>
                    </td> 
                    <td>
                    <?php if(permission('categories','edit')):?>
                         <a href="<?= admin_url('edit_category?id='.$row['category_id'])?>" class="btn">Duzenle</a>
                    <?php endif ?>
                    <?php if(permission('categories','delete')):?>
                         <a onclick="return confirm('Silme islemine davam edirsinizmi?')" href="<?= admin_url('delete?table=categories&column=category_id&id='.$row['category_id'])?>" class="btn">Sil</a> 
                    <?php endif ?>
                    </td>
                </tr>
           <?php endforeach?>
              
            </tbody>
        </table>
    </div> 
<?php require_once admin_view('static/footer')?>