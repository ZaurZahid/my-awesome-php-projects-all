<?php require_once admin_view('static/header')?>
    <div class="box-">
        <h1>
           Iletisim Mesajlari
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="table">
        <table>
            <thead>
                <tr>
                    <th>Gonderen</th>
                    <th>&nbsp;</th> 
                    <th class="hide">Mesaj Basligi</th>
                    <th class="hide">Konu</th>
                    <th class="hide">Mesaj tarixi</th>
                    <th>Islemler</th> 
                </tr>
            </thead>
            <tbody>
            <?php foreach($query as $row):?>
                <tr>
                    <td>
                        <a href="<?= admin_url('edit_user?id='.$row['user_id'])?>" class="title">
                          <p><?=$row['contact_name']?>(<?=$row['contact_email']?>)</p> 
                          <?=$row['contact_phone']?>
                        </a> 
                    </td> 
                    <td class="hide" style="width:10px;">
                         <?php if($row['contact_read']==1):?>
                             <strong style="color:grey">Oxuyan:<?=$row['user_name']?></strong>
                             <div style="padding:10px;border-radius:8px;background:green;text-align:center;">Oxundu</div>
                         <?php else:?>
                             <div style="padding:10px;border-radius:8px;background:red;text-align:center;">Oxunmadi</div>
                         <?php endif?>
                    </td>
                    <td class="hide" style="color:red;">
                        <?=$row['contact_subject']?>
                    </td>
                    <td class="hide">
                         <?php if(strlen($row['contact_message'])>40){?> 
                            <?=substr($row['contact_message'],0,40).".........Ardini oxu"?>
                         <?php } else{?>
                         <?=$row['contact_message']?>
                         <?php }?>
                    </td> 
                    <td class="hide">
                        <?=timeConvert($row['contact_date'])?>
                        <?php if($row['contact_read_date']):?>
                           <div style="color:grey;font-size:12px;padding-left:8px;">(<?=timeConvert($row['contact_read_date'])?> oxundu)</div>
                        <?php endif ?>
                    </td> 
                    <td>
                    <?php if(permission('contact','edit')):?>
                         <a href="<?= admin_url('edit_contact?id='.$row['contact_id'])?>" class="btn">Goruntule</a>
                    <?php endif ?>
                    <?php if(permission('contact','delete')):?>
                         <a onclick="return confirm('Silme islemine davam edirsinizmi?')" href="<?= admin_url('delete?table=contact&column=contact_id&id='.$row['contact_id'])?>" class="btn">Sil</a> 
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