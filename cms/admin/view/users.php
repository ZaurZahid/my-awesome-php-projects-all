<?php require_once admin_view('static/header')?>
    <div class="box-">
        <h1>
            Kullanicilar
           <!--  <a href="#">Add New</a> -->
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Kullanici Adi</th>
                    <th class="hide">Rutbe</th>
                    <th class="hide">Kullanici Emaili</th>
                    <th class="hide">Kayit tarixi</th>
                    <th>Islemler</th> 
                </tr>
            </thead>
            <tbody>
            <?php foreach($query as $row):?>
                <tr>
                    <td>
                        <a href="<?= admin_url('edit_user?id='.$row['user_id'])?>" class="title">
                           <?=$row['user_name']?>
                        </a> 
                    </td> 
                    <td class="hide" style="color:red;">
                        <?=user_ranks($row['user_rank'])?>
                    </td>
                    <td class="hide">
                        <?=$row['user_email']?>
                    </td>
                    <td class="hide">
                        <?=$row['user_date']?>
                    </td> 
                    <td>
                    <?php if(permission('users','edit')):?>
                         <a href="<?= admin_url('edit_user?id='.$row['user_id'])?>" class="btn">Duzenle</a>
                    <?php endif ?>
                    <?php if(permission('users','delete')):?>
                         <a onclick="return confirm('Silme islemine davam edirsinizmi?')" href="<?= admin_url('delete?table=users&column=user_id&id='.$row['user_id'])?>" class="btn">Sil</a> 
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