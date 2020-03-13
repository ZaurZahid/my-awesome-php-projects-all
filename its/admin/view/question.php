<?php require_once admin_view('static/header')?>
      <!-- End Navbar -->
       
      <div class="content"> 
      <?php if(permission("question",'add')):?>
         <div class="add-new"><a href="<?=admin_url('add-question')?>" class="btn btn-primary btn-round">Yeni ekle</a> </div> 
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
                                Sualin title-i
                              </th>
                              <th>
                                Sual
                              </th> 
                              <th>
                                Tarix
                              </th> 
                              <th>
                                Islemler
                              </th> 
                            </tr></thead>
                            <tbody class="table-sortable" data-table="question" data-column="question_sira" data-where="question_id">

                            <?php foreach($query as $question):?>

                            <tr id="id_<?=$question['question_id']?>">
                                <td><?=cut_text($question['question_title'],48)?></td>
                                <td><?=cut_text($question['question_content'],48)?></td>
                                <td><?=timeConvert($question['question_date'])?></td> 
                                <td>
                                <?php if(permission("question",'edit')):?>
                                  <a href="<?=admin_url('edit-question?id='.$question['question_id'])?>" class="btn btn-info btn-xs">Duzenle</a>
                                <?php endif?>
                                <?php if(permission("question",'delete')):?>
                                  <a onclick="return confirm('Silme islemine davam edirsinizmi?')" href="<?= admin_url('delete?table=question&column=question_id&id='.$question['question_id'])?>" class="btn btn-danger btn-xs">Sil</a> </td>
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
