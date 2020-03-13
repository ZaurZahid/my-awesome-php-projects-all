<?php require_once admin_view('static/header')?>
      <!-- End Navbar -->
       
      <div class="content"> 
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
                                Kullanici adi
                              </th>
                              <th>
                                Rutbe
                              </th>
                              <th>
                              Kullanici emaili
                              </th>
                              <th>
                                Qeydiyyat Zamani
                              </th>
                              <th>
                                Islemler
                              </th> 
                            </tr></thead>
                            <tbody>

                            <?php foreach($query as $user):?>

                            <tr style="<?=user_ranks($user['user_rank'])=="CEO"?"color:green;font-weight:550;font-size:22px;":"color:red"?>">
                                <td><?=$user['user_name']?></td>
                                <td><?=user_ranks($user['user_rank'])?></td>
                                <td><?=$user['user_email']?></td>
                                <td><?=$user['user_date']?></td> 
                                <td>
                                <?php if(permission("users",'edit')):?>
                                  <a href="<?=admin_url('edit-user?id='.$user['user_id'])?>" class="btn btn-info btn-xs">Duzenle</a>
                                <?php endif?>
                                <?php if(permission("users",'delete')):?>
                                  <a onclick="return confirm('Silme islemine davam edirsinizmi?')" href="<?= admin_url('delete?table=users&column=user_id&id='.$user['user_id'])?>" class="btn btn-danger btn-xs">Sil</a> </td>
                                <?php endif?>
                              </tr>

                            <?php endforeach?>
      
                            </tbody>
                          </table>
                      </div>
                    </div>
                    <?php else:?>
                        <h4>Hele sekil yuklenilmeyib</h4>
                    <?php endif?>
                
              </div>
            </div> 
          </div>
        </div> 

        <?php if($totalRecord > $pageLimit):?>
          <div class="pagination2">
              <ul>
                <?=$db->showPagination(admin_url(route(1)).'?'.$pageParam.'=[page]');?>
              </ul>
          </div>
       <?php endif?>
      </div>
<?php require_once admin_view('static/footer')?>
