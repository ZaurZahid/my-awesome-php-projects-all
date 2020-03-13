<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Page Title -->
    <title><?= $meta['title']?></title>
    
    <?php if(isset($meta['description'])):?>
    <meta name="description" content="<?=$meta['description']?>">
    <?php endif ?>

    <?php if(isset($meta['keywords'])):?>
    <meta name="keywords" content="<?=$meta['keywords']?>"?>
    <?php endif ?>

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?=public_url('images/logo/favicon.png')?>" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?=public_url('css/animate-3.7.0.css')?>">
    <link rel="stylesheet" href="<?=public_url('css/font-awesome-4.7.0.min.css')?>">
    <link rel="stylesheet" href="<?=public_url('fonts/flat-icon/flaticon.css')?>">
    <link rel="stylesheet" href="<?=public_url('css/bootstrap-4.1.3.min.css')?>">
    <link rel="stylesheet" href="<?=public_url('css/owl-carousel.min.css')?>">
    <link rel="stylesheet" href="<?=public_url('css/nice-select.css')?>">
    <link rel="stylesheet" href="<?=public_url('css/style.css')?>">
  
    <!-- JAVASCRIPT -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="<?=public_url('js/api.js')?>"></script>
    
    <script>
       var api_url='<?=site_url('api')?>'
    </script>
</head>
<body>
    <!-- Preloader Starts -->
    <div class="preloader">
        <div class="spinner"></div>
    </div>
    <!-- Preloader End -->

    <!-- Header Area Starts -->
	<header class="header-area main-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo-area">
                        <a href="<?=site_url('index')?>"><img src="<?=public_url('images/logo.png')?>" alt="<?=setting('logo')?>"></a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="custom-navbar">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>  
                    <div class="main-menu">
                        <ul>
                         <?php if(session('user_id')):?>
                            <li><a class="btn btn-warning btn-xs" href="#"><?= session('user_name')?> </a>
                                <ul class="sub-menu">
                                    <li><a href="<?=site_url('profil')?>">Profil</a></li>
                                    <li><a href="<?=site_url('cixis')?>">Cixis ele</a></li> 
                                </ul>
                            </li>
                         <?php endif?> 

                <!-- MENU TASARIMI -->
                  <?php foreach(menu(12) as $key=>$menu):?>
                         <?php if(isset($menu['submenu'])):?>
                                 <li><a href="<?=$menu['url']?>"><?=$menu['title']?></a>
                                    <ul class="sub-menu">
                                        <?php foreach($menu['submenu'] as $k=>$submenu):?>
                                            <li><a href="<?=$submenu['url']?>"><?=$submenu['title']?></a></li>
                                        <?php endforeach?>
                                    </ul>
                                </li>  
                        <?php else:?>
                            <li><a href="<?=$menu['url']?>"><?=$menu['title']?></a></li>  
                        <?php endif?>
               <?php endforeach?>   

                            <?php if(!session('user_id')) : ?>
                                <li class="menu-btn">
                                    <a href="<?= site_url('login')?>" class="login">log in</a>
                                    <a href="<?= site_url('kayit')?>" class="template-btn">sign up</a>
                                </li>
                            <?php endif ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
