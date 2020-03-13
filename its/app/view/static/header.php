<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?=$meta['title']?></title>
        <?php if(isset($meta['description'])):?>
           <meta name="description" content="<?=$meta['description']?>">
        <?php endif?>
        <?php if(isset($meta['keywords'])):?>
           <meta name="keywords" content="<?=$meta['keywords']?>">
        <?php endif?>
            <!-- CSS Files -->
        <link rel="stylesheet" href="<?=public_url('style/bootstrap-4.1.3.min.css')?>"> 
        <link rel="stylesheet" href="<?=public_url('style/animation.css')?>">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">     
        <link rel="stylesheet" href="<?=public_url('style/icons.css')?>">  
        <link rel="stylesheet" href="<?=public_url('style/style.css')?>">
        <link href="<?=public_url('img/favicon.ico')?>" rel="icon" type="image/x-icon" />
    
        <!-- JAVASCRIPT -->
        <script src="<?=public_url('js/boostrap.min.js')?>"></script> 
        <script src="<?=public_url('js/jquery.fullPage.js')?>"></script>
        <script src="<?=public_url('js/jquery.js')?>"></script> 
        <script src="<?=public_url('js/extra.js')?>"></script> 
        <script src="<?=public_url('js/api.js')?>"></script>   
        <script>
        var api_url='<?=site_url('api')?>' 
        </script>
    </head>
<body class="bubble-3">
<header class="header-area main-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="<?=site_url('index')?>"></a>
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
                            <?php foreach(menu(19) as $key=>$menu):?>
                                <li>
                                    <a href="<?php  if($menu['url']=='elaqe'):?>
                                    <?='/its/#contact'?> 
                                    <?php else:?>
                                      <?=$menu['url']?> 
                                    <?php endif;?>"><?=$menu['title']?></a> 
                                    <!-- Eger submenu varsa ul elave ele ve her biri ucun bir <li> yarat -->
                                    <?php if(isset($menu['submenu'])):?>
                                      <ul class="child-menu-container">
                                         <?php foreach($menu['submenu'] as $key2=>$submenu):?>
                                            <li class="child-menu">
                                                <a href="<?=$submenu['url']?>"><?=$submenu['title']?></a>
                                            </li>
                                         <?php endforeach?>
                                      </ul>
                                    <?php endif;?> 
                                </li>
                            <?php endforeach?>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </header>