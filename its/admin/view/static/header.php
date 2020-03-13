
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?=admin_public_url('img/apple-icon.png')?>">
  <link rel="icon" type="image/png" href="<?=admin_public_url('img/favicon.png')?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Its-Admin
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="<?=admin_public_url('css/extra.css')?>" rel="stylesheet" /> 
  <link href="<?=admin_public_url('css/material-dashboard.css?v='.time())?>" rel="stylesheet" /> 
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

<body class="">
<div class="success-msg">
    <a href="" class="success-close-btn"><i class="fa fa-times"></i></a>
    <div></div>
</div>  
  <div class="wrapper ">
    <?php if(session('user_name')):?>
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="<?=admin_public_url('img/sidebar-1.jpg')?>">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
     -->
      <div class="logo">
        <a href="" class="simple-text logo-normal">
        Admin of site is <?=$_SESSION['user_name']?> :)
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
        <?php foreach($menus as $mainUrl=>$menu):  
          if(!permission($mainUrl,'show')) continue;?>
          <li class="nav-item <?=(route(1)==$mainUrl)? 'active' : null?>  ">
            <a class="nav-link" href="<?= admin_url($mainUrl)?>">
              <i class="material-icons"><?=$menu['icon']?></i>
              <p><?=$menu['title']?></p>
            </a>
          </li>
      
        <?php endforeach?> 
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="">
            <?php foreach($menus as $mainUrl=>$menu): ?>
              <?=(route(1)==$mainUrl) ? $menu['title'] : ' '?>
            <?php endforeach?> 
          </a>
          </div> 
          <div class="collapse navbar-collapse justify-content-end"> 
            <ul class="navbar-nav"> 
              <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <a class="dropdown-item" href="<?=admin_url()?>">Profile-<?=$_SESSION['user_name']?></a>
                   <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="<?=admin_url('cixis')?>">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <?php endif?>