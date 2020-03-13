
<!doctype html>
<html lang="en">
<head>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <meta charset="UTF-8">
    <title>Document</title>

    <!--styles-->
    <link rel="stylesheet" href="<?=admin_public_url('styles/main.css?v='.time())?>">
    <link rel="stylesheet" href="<?=admin_public_url('styles/extra.css?v='.time())?>">
    <link rel="stylesheet" href="<?=admin_public_url('vendor/jquery-tag-input/jquery.tagsinput-revisited.min.css')?>"> 

    <!--scripts-->
    <script src="<?=admin_public_url('scripts/jquery-1.12.2.min.js')?>"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 

    <script src="<?=admin_public_url('vendor/jquery-tag-input/jquery.tagsinput-revisited.min.js')?>"></script>

<!--     <script src="https://cdn.ckeditor.com/4.5.7/basic/ckeditor.js"></script>
 -->    <script src="<?=admin_public_url('scripts/admin.js')?>"></script>
  <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js"></script>
  <script src="<?=admin_public_url('scripts/api.js')?>"></script>
    <script>
        var api_url='<?=admin_url('api')?>',
         app_url='<?=site_url('app')?>'
    </script> 
</head> 
<body>

<div class="success-msg">
    <a href="" class="success-close-btn"><i class="fa fa-times"></i></a>
    <div></div>
</div> 

<?php if(session('user_rank') && session('user_rank')!=3):?>  
    <!--navbar-->
    <div class="navbar">
        <ul dropdown>
            <li>
                <a href="#">
                    <span class="fa fa-home"></span>
                    <span class="title">
                        <?=setting('title')?>
                    </span>
                </a>
            </li>
            <li>
                <a href="<?=admin_url('logout')?>">
                   Cixis yap
                </a>
            </li>
          <!--   <li>
                <a href="#">
                    <span class="fa fa-plus"></span>
                    <span class="title">New</span>
                </a>
                <ul>
                    <li>
                        <a href="#">
                            New Post
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            New Page
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            New Category
                        </a>
                    </li>
                </ul>
            </li> -->
        </ul>
    </div> 
    <!--sidebar-->
    <div class="sidebar"> 
        <ul> 
    <?php foreach($menus as $mainUrl=>$menu): 
        if(!permission($mainUrl ,'show')) continue;//hansi menuda show yoxdusa ve =>false-dusa  continue ile onu sayma?>
            <li class="<?=(route(1)==$mainUrl) || isset($menu['submenu'][route(1)]) ? 'active' : null ?>">
                <a href="<?= admin_url($mainUrl)?>">
                    <span class="fa fa-<?=$menu['icon']?>"></span>
                    <span class="title">
                        <?=$menu['title']?> 
                    </span>
                </a>

                <?php if(isset($menu['submenu'])): ?>
                    <ul class="sub-menu">
                    <?php foreach($menu['submenu'] as $url=>$title):?>
                        <li>
                        <a href="<?= admin_url($url)?>">
                                <?=$title ?>
                        </a> 
                        </li>
                <?php endforeach;?> 
                        
                    </ul>
            <?php endif; ?>

            </li> 
        <?php endforeach;?> 
            <li class="line"><span></span></li>
        </ul>
    <!--     <a href="#" class="collapse-menu">
            <span class="fa fa-arrow-circle-left"></span>
            <span class="title">
                Collapse menu
            </span>
        </a>
    -->
    </div>

    <!--content-->
    <div class="content">
        <?php if($error):?> 
        <div class="message error box-">
            <?=$error?>
        </div> 
        <?php endif ?>
        
<?php endif?>