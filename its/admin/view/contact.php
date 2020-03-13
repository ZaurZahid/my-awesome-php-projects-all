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
                                Gonderen
                              </th> 
                              <th>
                                &nbsp;
                              </th> 
                              <th>
                               Gonderen emaili
                              </th>
                              <th>
                                Movzu
                              </th>
                              <th>
                                Mezmun
                              </th>
                              <th>
                                Tarix
                              </th>
                              <th>
                                Islemler
                              </th> 
                            </tr></thead>
                            <tbody>

                            <?php foreach($query as $contact):?>

                            <tr>
                                <td><?=$contact['contact_name']?></td> 
                                <td><?php if($contact['contact_read']==1):?>
                                   <div style="padding:10px;border-radius:8px;background:green;text-align:center;color:white">Oxundu</div>
                                <?php else:?>
                                   <div style="padding:10px;border-radius:8px;background:red;text-align:center;color:white">Oxunmadi</div>
                                <?php endif?>
                                </td> 
                                <td><?=$contact['contact_email']?></td>
                                <td style="color:#ff8000;"><--<?=$contact['contact_movzu']?>--></td> 
                                <td><?=cut_text($contact['contact_mezmun'],10)?></td>  
                                <td><?=timeConvert($contact['contact_date'])?>
                                <?php if($contact['contact_read_date']):?>
                                    <div style="color:grey;font-size:12px;padding-left:8px;">(<?=timeConvert($contact['contact_read_date'])?> oxundu)</div>
                                <?php endif ?>
                                </td>   
                                <td>
                                <?php if(permission("contact",'edit')):?>
                                  <a href="<?=admin_url('edit-contact?id='.$contact['contact_id'])?>" class="btn btn-info btn-xs">Goruntule</a>
                                <?php endif?>
                                <?php if(permission("contact",'delete')):?>
                                  <a onclick="return confirm('Silme islemine davam edirsinizmi?')" href="<?= admin_url('delete?table=contact&column=contact_id&id='.$contact['contact_id'])?>" class="btn btn-danger btn-xs">Sil</a> </td>
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

        <?php if($totalRecord > $pageLimit):?>
          <div class="pagination2">
              <ul>
                <?=$db->showPagination(admin_url(route(1)).'?'.$pageParam.'=[page]');?>
              </ul>
          </div>
       <?php endif?>
      </div>
<?php require_once admin_view('static/footer')?>
