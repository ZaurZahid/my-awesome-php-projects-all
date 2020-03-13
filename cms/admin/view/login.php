<?php require_once admin_view('static/header')?>
     
 <!--login screen-->
 <div class="login-screen">  
        <!--login logo-->
        <div class="login-logo">
            <a href="#">
                <img src="<?=admin_public_url('/images/logo.png')?>" alt="">
            </a>
        </div>

        <?php if($error):?>
        <div class="message error box-">
            <?=$error?>
        </div> 
        <?php endif ?>
        
        <form action="" method="post">
            <ul>
                <li>
                    <label for="username">Kullanici adiniz</label>
                    <input type="text" name="user_name" value="<?=$data['user_name']?>">
                </li>
                <li>
                    <label for="password">Sifreniz</label>
                    <input type="password" name="user_password">
                </li>
                <li>
                    <button type="submit" name="submit" value="1">Giris yap</button> 
                </li>
            </ul>
        </form>

      
    </div>


<?php require_once admin_view('static/footer')?>