
<?php require_once admin_view('static/header')?>
  
<div class="content">
<div class="container-fluid">
          <div class="row">
            <div class="col-md-6">
              <div class="card"> 
                <div class="card-body">  
                    <div class="row">
                      <?php if($row['contact_read']==1):?>
                        <div class="col-md-7">
                          <div class="alert alert-success">
                            <strong style="color:white"><?=timeConvert($row['contact_date'])?> evvel gonderildi.</strong><br>
                            <?=timeConvert($row['contact_read_date'])?>  oxundu. 
                          </div>
                        </div> 
                      <?php endif ?>  
                    <div class="col-md-7"> <h2>Iletisim mesaji</h2></div> 
                      <div class="col-md-7">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Gonderen</label>
                          <input type="text" value="<?=$row['contact_name']?>" class="form-control" disabled="">
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Gonderilme Tarixi</label>
                          <input type="text" value="<?=$row['contact_date']?>" class="form-control" disabled="">
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Emaili</label>
                          <input type="email"  value="<?=$row['contact_email']?>" class="form-control"disabled="">
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Telefon</label>
                          <input type="email" value="<?=$row['contact_phone']?>" class="form-control" disabled="">
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Movzu</label>
                          <input type="email"  value="<?=$row['contact_movzu']?>" class="form-control"disabled="">
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group bmd-form-group"> 
                          <p style="color:blue;font-weight:bold"><?=nl2br($row['contact_mezmun'])?>  
                        </div>
                      </div>
                    </div>   
                    <div class="clearfix"></div> 
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card"> 
                <div class="card-body">  
                  <div class="alert alert-danger" id="error" style="display:none"></div> 
                  <div class="alert alert-success" id="success" style="display:none"></div> 
                  <input type="hidden" name='name' value="<?=$row['contact_name']?>">
                  <form action="" id="email-form" onsubmit="return false;">
                    <div class="row">
                    <div class="col-md-7"> <h2 style="font-weight:bold;color:red;">Cavabla</h2></div> 
                      <div class="col-md-7">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Movzu</label>
                          <input type="text"name="movzu"  value="RE:<?=$row['contact_movzu']?>" class="form-control" placeholder="Mesaj basligi" >
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email</label>
                          <input type="text" name="email" value="<?=$row['contact_email']?>" class="form-control" >
                        </div>
                      </div> 
                      <div class="col-md-7">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Mesajinizi yazin....</label> 
                          <textarea  name="message"  cols="30" rows="8" class="form-control"></textarea>
                        </div>
                      </div>
                    </div>   
                    <button type="submit" onclick="send_email('#email-form')" class="btn btn-warning">Gonder</button> 
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
</div>

<?php require_once admin_view('static/footer')?>
 