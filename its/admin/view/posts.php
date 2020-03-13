<?php require_once admin_view('static/header')?>
      <!-- End Navbar -->
       
      <div class="content"> 
      <?php if(permission("posts",'add')):?>
       <div class="add-new"><a href="<?=admin_url('add-post')?>" class="btn btn-primary btn-round">Yeni ekle</a> </div> 
      <?php endif?>
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div class="card"> 
                <div class="card-body">
                    <?php if($query):?>
                        <div class="table-responsive">
                          <table class="table">
                            <thead class=" text-primary">
                              <tr><th>
                                Basliq
                              </th>   
                              <th>
                                Ekrana Cixma Tarix
                              </th>
                              <th>
                                Islemler
                              </th> 
                            </tr></thead>
                            <tbody>

                            <?php foreach($query as $post):?>

                            <tr>
                                <td><?=$post['post_title']?></td>  
                                </td>    
                                <td><?=timeConvert($post['post_date'])?> 
                                </td>   
                                <td>
                                <?php if(permission('posts','edit')):?>
                                  <a href="<?=site_url($post['post_menu'].'/'.$post['post_url'])?>" class="btn btn-info" target="_blank">Goruntule</a>
                                  <a href="<?= admin_url('edit-post?id='.$post['post_id'])?>" class="btn btn-success">Duzenle</a>
                              <?php endif ?>
                              <?php if(permission("posts",'delete')):?>
                                <a onclick="return confirm('Silme islemine davam edirsinizmi?')" href="<?= admin_url('delete?table=posts&column=post_id&id='.$post['post_id'])?>" class="btn btn-danger btn-xs">Sil</a> </td>
                              <?php endif?>
                              </tr>

                            <?php endforeach?>
      
                            </tbody>
                          </table>
                      </div>
                    </div>
                    <?php else:?>
                        <h4>Hele mesaj gelmeyib</h4>
                    <?php endif?>
                
              </div>
            </div> 
          </div>
        </div> 

        <?php if($totalRecord > $postLimit):?>
          <div class="pagination2">
              <ul>
                <?=$db->showPagination(admin_url(route(1)).'?'.$postParam.'=[post]');?>
              </ul>
          </div>
       <?php endif?>
      </div>
<?php require_once admin_view('static/footer')?>
