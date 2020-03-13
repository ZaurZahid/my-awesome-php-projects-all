
<?php require_once admin_view('static/header')?>
  
<div class="content">
<div class="container-fluid">
          <div class="row">
            <div class="col-md-8">
              <div class="card"> 
                <div class="card-body"> 
                  <?php if ($error=error()):?>
                        <div class="alert alert-danger"> 
                          <span>
                            <b> Danger - </b> <?=$error?></span>
                        </div>
                  <?php endif?>
                  <form action="" method="post">
                    <div class="row">
                      <div class="col-md-7">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text"name="user_name" value="<?=$row['user_name']?>" class="form-control" readonly="">
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Qeydiyyat Tarixi</label>
                          <input type="text" value="<?=$row['user_date']?>" class="form-control" disabled="">
                        </div>
                      </div>
                      <div class="col-md-7">
                        <div class="form-group bmd-form-group">
                          <label class="bmd-label-floating">Email(Deyisdire bilersiniz)</label>
                          <input type="email" name="user_email" value="<?=$row['user_email']?>" class="form-control">
                        </div>
                      </div>
                     <div class="col-md-7">
                     <label>Izinler</label>
                    <div class="form-content">
                         <div class="permissions"> 
                                <?php foreach($menus as $url=>$menu):?>
                                    <div>
                                        <h3><?=$menu['title']?></h3> 
                                            <div class="list">
                                                <?php foreach($menu['permissions'] as $key=>$val):?>
                                                  <input <?=isset($permissions[$url][$key]) && $permissions[$url][$key]==1 ? 'checked' : null  ?> type="checkbox" value="1" name="user_permissions[<?=$url?>][<?=$key?>]"><?=$val?>
                                                <?php endforeach?>
                                            </div>
                                    </div>
                                <?php endforeach?> 
                        </div>
                    </div>
                    <style>
                        .permissions{
                            border:1px solid blue;
                            background:white;
                            max-width:400px;
                            padding:10px; 
                        }
                        .permissions h3{ 
                            font-size: 14px;
                            font-weight:bold;
                        }
                        .permissions .list input{ 
                          width:20px;
                          height:20px;
                        } 
                        .permissions .list label{
                            color: #742994;
                            float:none !important;
                            display:inline;
                            font-weight:normal !important;
                            width:auto !important;
                            margin-right:10px;

                        }
                        
                        .permissions div:last-child .list{
                            padding-bottom:0px;
                        }
                    </style>
                     </div>
                    </div>   
                    <button type="submit" name="submit" value="1" class="btn btn-primary pull-right">Update Profile</button>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            
          </div>
        </div>
</div>

<?php require_once admin_view('static/footer')?>
 