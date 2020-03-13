<?php require_once admin_view('static/header')?>
      <!-- End Navbar -->
       
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card"> 
                <div class="card-body">
                <?php if($sonuc['hata']):?>
                     <div class="alert alert-danger"><?=$sonuc['hata']?></div>
                <?php elseif($sonuc['success']):?>
                     <div class="alert alert-success"><?=$sonuc['success']?></div>
                <?php endif?>   
                <?php if(permission("partners",'add')):?>    
                   <form action="" method="post" enctype="multipart/form-data">  
                  
                      <input type="file" name="partner_img" >   
                      <input type="hidden" name="submit" value="1">

                      <button type="submit" class="btn btn-primary pull-right">Yukle</button>
                      <div class="clearfix"></div>
                  </form>
                  <?php endif?>
                </div>
              </div>
            </div> 
          </div>
        </div>


        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card"> 
                <div class="card-body">
                    <?php if($query3):?>
                        <div class="table-responsive">
                          <table class="table">
                            <thead class=" text-primary">
                              <tr><th>
                                ID
                              </th>
                              <th>
                                Sekil
                              </th>
                              <th>
                                Yuklenme Zamani
                              </th>
                              <th>
                                Islem
                              </th> 
                            </tr></thead>
                            <tbody>

                            <?php foreach($query3 as $sekiller):?>

                            <tr>
                                <td><?=$sekiller['partners_id']?></td>
                                <td><img style="width:60px;heigth:50px;" src="<?=public_url('img/img/'.$sekiller['partners_img'])?>"></td>
                                <td><?=$sekiller['partners_date']?></td> 
                                <?php if(permission("partners",'delete')):?>
                                <td><a onclick="return confirm('Silme islemine davam edirsinizmi?')" href="<?= admin_url('delete?table=partners&column=partners_id&id='.$sekiller['partners_id'].'&img='.$sekiller['partners_img'])?>" class="btn btn-danger">Sil</a> </td>
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
      </div>
<?php require_once admin_view('static/footer')?>
