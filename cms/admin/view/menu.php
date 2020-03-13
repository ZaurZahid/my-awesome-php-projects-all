<?php require_once admin_view('static/header')?>

<div class="box-">
        <h1>
           Menu Yonetimi
            <?php if(permission('menu','add')):?>
            <a href="<?=admin_url('add_menu')?>">Yeni Ekle</a>
            <?endif?>
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Menu Basligi</th>
                    <th class="hide">Eklenme Tarixi</th>  
                    <th>Islemler</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rows as $row):?> 
                    <tr> 
                        <td class="hide">
                        <?=$row['menu_title']?>
                        </td>
                        <td class="hide"> 
                        <?=$row['menu_tarix']?>
                        </td>
                        <td class="hide"> 
                        <?php if(permission('menu','edit')):?>
                            <a href="<?=admin_url('edit-menu?id='.$row['menu_id'])?>" class="btn btn-primary btn-xs">Duzenle</a>
                        <?php endif ?>
                        <?php if(permission('menu','delete')):?>
                            <a onclick="return confirm('Silme islemine davam edirsinizmi?')" href="<?=admin_url('delete?table=menu&column=menu_id&id='.$row['menu_id'])?>" class="btn btn-danger btn-xs">Sil</a> 
                        </td> 
                        <?php endif ?>
                    </tr>
            <?php endforeach?>
            </tbody>
        </table>
    </div>

<?php require_once admin_view('static/footer')?>