<?php require_once admin_view('static/header')?>
   
      
<div class="content">   
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-10">
              <div class="card"> 
                <?php if($error):?>
                  <div class="alert alert-danger"> 
                    <span>
                      <b> Danger - </b> <?=$error?></span>
                  </div>
                <?php endif?>
                 <div class="card-body"> 
                 <div class="col-md-7"> </div> 
                    <form action="" method="post">
                      <div class="col-md-7">
                          <div class="form-group bmd-form-group">
                           <label class="bmd-label-floating">Sual basligi</label>
                           <input type="text" name='question_title' value="<?=post('question_title') ? post('question_title') : $row['question_title']?>" class="form-control" >
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Sual iceriyi</label> 
                          <textarea name="question_content" cols="20" rows="5" class="form-control" ><?=post('question_content') ? post('question_content') : htmlspecialchars_decode($row['question_content'])?></textarea>
                        </div>
                      </div>
                      <button type="submit" name='submit' value="1" class="btn btn-primary btn-round">Yazdir</button>  
                    </form> 
                    </div>   
                    <div class="clearfix"></div> 
                 </div>
              </div>
            </div> 
          </div>
        </div>
    </div>
<?php require_once admin_view('static/footer')?>
