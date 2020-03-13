<?php require_once admin_view('static/header')?>
    <div class="box-">
        <h1>
           Yorumlar 
        </h1>
    </div>
 
    <div class="admin-tab"> 
        <ul tab-list>
            <li class="<?=!get('status') ? 'active' : null?>"><a href="<?=admin_url('comments')?>">Hamisi</a></li> 
            <li class="<?=get('status')==1 ? 'active' : null?>"><a href="<?=admin_url('comments?status=1')?>">Onaylananlar</a></li>
            <li class="<?=get('status')==2 ? 'active' : null?>"><a href="<?=admin_url('comments?status=2')?>">Onay bekleyenler</a></li>
        </ul> 
    </div>
    <div class="table" style="margin:20px 0 80px 0;">
        <table>
            <thead>
                <tr>  
                    <th class="hide">Sekil</th>
                    <th class="hide">Yorum</th>
                    <th>Movzu</th>
                    <th class="hide">Yazilma tarixi</th>
                    <th>Islemler</th> 
                </tr>
            </thead>
            <tbody>
            <?php foreach($query as $row):?>
                <tr>
                    <td>
                        <img style="border-radius: 25px;height:60px;" src="<?=get_gravatar($row['comment_email'])?>" >
                    </td>
                    <td> 
                        <a href="<?= admin_url('edit_comment?id='.$row['comment_id'])?>" class="title">
                          <p><?=$row['comment_name']?>(<?=$row['comment_email']?>)
                            <?php if($row['comment_status']==2):?>
                            <span style="background:grey;color:white;padding:2px 5px;border-radius:5px; margin-left:10px">Onay bekliyor</span>
                            <?php endif?></p>
                          <p style="color:#38ce38; font-size:15px;"><?=cut_text($row['comment_content'],150)?></p>
                        </a> 
                    </td> 
                    <td>
                        <a href="<?=site_url('blog/'.$row['post_url'])?>" taget='_blank'><?=$row['post_title']?></a>
                    </td>
                    <td class="hide" title="<?=$row['comment_date']?>">
                        <?=timeConvert($row['comment_date'])?> 
                    </td> 
                    <td>
                    <?php if(permission('comments','edit')):?>
                          <a href="<?= admin_url('edit_comment?id='.$row['comment_id'])?>" class="btn">Duzenle</a>
                    <?php endif ?>
                    <?php if(permission('comments','delete')):?>
                         <a onclick="return confirm('Silme islemine davam edirsinizmi?')" href="<?= admin_url('delete?table=comments&column=comment_id&id='.$row['comment_id'])?>" class="btn">Sil</a> 
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
            <?=$db->showPagination(admin_url(route(1)).'?'.$pageParam.'=[page]&status='.get('status'));?>
            </ul>
        </div>
  <?php endif?>
<?php require_once admin_view('static/footer')?>