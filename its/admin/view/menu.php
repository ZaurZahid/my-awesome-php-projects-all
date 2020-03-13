<?php require_once admin_view('static/header')?>
   
      
<div class="content">
<?php if(permission("menu",'add')):?>
 <div class="add-new"><a href="<?=admin_url('add-menu')?>" class="btn btn-primary btn-round">Yeni ekle</a> </div> 
 <?php endif?>    
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card"> 
                 <div class="card-body">
                    <?php if($query):?>
                        <div class="table-responsive">
                          <table class="table">
                            <thead class="text-primary">
                              <tr> 
                                <th>
                                  Menu Basligi
                                </th>
                                <th>
                                  Yuklenme Zamani
                                </th>
                                <th>
                                  Islem
                                </th> 
                              </tr>
                            </thead>
                            <tbody>

                              <?php foreach($query as $menular):?>

                              <tr>
                                  <td><?=$menular['menu_title']?></td>
                                  <td><?=$menular['menu_tarix']?></td>   
                                  <td>
                                  <?php if(permission("users",'edit')):?>
                                    <a href="<?=admin_url('edit-menu?id='.$menular['menu_id'])?>" class="btn btn-info">Duzenle</a>
                                    <?php endif?>
                                    <?php if(permission("users",'delete')):?>
                                    <a onclick="return confirm('Silme islemine davam edirsinizmi?')" href="<?= admin_url('delete?table=menu&column=menu_id&id='.$menular['menu_id'])?>" class="btn btn-danger">Sil</a>
                                    <?php endif?> 
                                  </td>
                              </tr>

                              <?php endforeach?>
        
                            </tbody>
                          </table>
                       </div> 
                    <?php else:?>
                        <h4>Hele sekil yuklenilmeyib</h4>
                    <?php endif?>
                
                 </div>
              </div>
            </div> 
          </div>
        </div>
    </div>
<?php require_once admin_view('static/footer')?>
