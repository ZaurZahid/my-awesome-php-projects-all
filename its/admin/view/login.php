<?php require_once admin_view('static/header')?>
     <style>
     #login-ul{
         list-style-type:none
     }
     .login-screen form {
        width: 330px;
        height: 280px;
        margin-top: 20px;
        margin-left: 0;
        background:#ff898926;
        padding: 26px 24px 32px;
        font-weight: 400;
        overflow: hidden;
        -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.13);
        box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
        margin-bottom: 30px;
        }
        .login-screen form button{
            margin-top:20px;
        }
        .login-screen2{
            width: 380px;
            height: 420px;
            margin-top: 20px;
            margin-left: 0;
            background:#ff898926;
            padding: 26px 24px 32px;
            font-weight: 400;
            overflow: hidden;
            -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.13);
            box-shadow: 5px 5px 5px rgba(0, 0, 0, 0.5);
            margin-bottom: 30px;
        }
        .login-screen2 form button{
            margin-top:20px;
        }
        .panel{
            margin:100px;
        }
     </style>
 <!--login screen-->
 <div class="main-panel">
     <div class="content">
         <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5" id="log"style="display:block;">
                        <div class="card"> 
                            <!--login logo-->  
                            <?php if(error()):?>
                            <div class="alert alert-danger">
                                <?=error()?>
                            </div> 
                            <?php endif ?> 
                            <?php if($success):?>
                            <div class="alert alert-success">
                                <?=$success?>
                            </div> 
                            <?php endif ?> 
                            <div class="login-screen">  
                                <form action="" method="post">
                                    <ul id="login-ul">
                                        <li>
                                            <label for="username">Kullanici adiniz</label>
                                            <input type="text" name="user_name" value="<?=post('user_name')?post('user_name'):$data['user_name']?>" class="form-control">
                                        </li>
                                        <li>
                                            <label for="password">Sifreniz</label>
                                            <input type="password" name="user_password"class="form-control">
                                        </li>
                                        <li>
                                            <button type="submit" name="submit" value="1"class="btn btn-warning">Giris yap</button> 
                                        </li>
                                    </ul>
                                </form>
                        </div>  
                        </div>
                    </div>
                    <div class="col-md-5" id="reg" style="display:none;">
                        <div class="card"> 
                            <!--login logo-->  
                            <?php if($error):?>
                            <div class="alert alert-danger">
                                <?=$error?>
                            </div> 
                            <?php endif ?> 
                            <?php if($success):?>
                            <div class="alert alert-success">
                                <?=$success?>
                            </div> 
                            <?php endif ?> 
                            <div class="login-screen2">  
                                <form action="" method="post">
                                    <ul id="login-ul">
                                        <li>
                                            <label for="username">Kullanici adiniz</label>
                                            <input type="text" name="user_name2" value="<?=$data['user_name']?>" class="form-control">
                                        </li>
                                        <li>
                                            <label for="username">Emailiniz</label>
                                            <input type="text" name="user_email" value="<?=$data['user_name']?>" class="form-control">
                                        </li>
                                        <li>
                                            <label for="password">Sifreniz</label>
                                            <input type="password" name="password" class="form-control">
                                        </li>
                                        <li>
                                            <label for="password">Sifreniz tekrar</label>
                                            <input type="password" name="password_again"class="form-control">
                                        </li>
                                        <li>
                                            <button type="submit" name="submit2" value="2"class="btn btn-success">Qeydiyyat</button> 
                                        </li>
                                    </ul>
                                </form>
                        </div> 

                        
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="card">
                            <button class="btn btn-warning" id="w">LOGIN</button> 
                            <button class="btn btn-success"id="s">Register</button> 
                        </div>
                    </div> 
                </div>
         </div>
     </div>
 </div>
        
<?php require_once admin_view('static/footer')?>
         <script>
             $(function(){
                $(document.body).on('click','#s',function(e){
                    $('#reg').css('display','block');
                    $('#log').css('display','none'); 
                    e.preventDefault();
                });

                $(document.body).on('click','#w',function(e){
                    $('#log').css('display','block');
                    $('#reg').css('display','none'); 
                    e.preventDefault();
                })
             })
         </script>