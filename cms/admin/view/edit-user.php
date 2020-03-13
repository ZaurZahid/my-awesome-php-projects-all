<?php require_once admin_view('static/header')?>
    
<div class="box-">
        <h1>
            Kullanici duzenle
        </h1>
    </div>

    <div class="clear" style="height: 10px;"></div>

    <div class="box-">
        <form action="" method="post" class="form label">
            <ul>
                <li>
                    <label>Kullanici Adi</label>
                    <div class="form-content">
                        <input type="text" name="user_name" value="<?=post('user_name') ? post('user_name') :$row['user_name'] ?>">
                    </div>
                </li> 
                <li>
                    <label>Kullanici Emaili</label>
                    <div class="form-content">
                        <input type="text" name="user_email" value="<?=post('user_email') ? post('user_email') :$row['user_email'] ?>">
                    </div>
                </li> 
                <li>
                    <label>Rutbe</label>
                    <div class="form-content">
                        <select name="user_rank" >
                            <option value="">-Rutbe secin-</option>
                            <?php foreach(user_ranks() as $num=>$rank):?>
                                <option <?=(post("user_rank") ? post("user_rank") :$row['user_rank']) ==$num ? 'selected' : null?> value="<?=$num?>"><?=$rank?></option>
                            <?php endforeach?> 
                        </select>
                    </div>
                </li> 
                <li>
                    <label>Izinler</label>
                    <div class="form-content">
                         <div class="permissions"> 
                                <?php foreach($menus as $url=>$menu):?>
                                    <div>
                                        <h3><?=$menu['title']?></h3> 
                                            <div class="list">
                                              <?php foreach($menu['permissions'] as $key=>$val):?>
                                                  <label>
                                                     <input <?=(isset($permissions[$url][$key]) && $permissions[$url][$key]==1   ? ' checked' : null )?> type="checkbox" value="1" name="user_permissions[<?=$url?>][<?=$key?>]"><?=$val?>
                                                 </label>    
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
                     font-weight:bold;
                 }
                 .permissions .list{ 
                    padding-bottom:10px;
                 }
                 .permissions .list label{
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
                </li> 
                <li class="submit">
                    <button type="submit" name="submit" value="1">Save Changes</button>
                </li>
            </ul>
        </form>
    </div>


<?php require_once admin_view('static/footer')?>