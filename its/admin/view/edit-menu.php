<head> 
    <link rel="stylesheet" href="<?=admin_public_url('css/menu.css')?>"> 
 </head>
<?php require_once admin_view('static/header')?>
  
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card"> 
            <div class="card-body">

            <?php if($error):?>
                  <div class="alert alert-danger"> 
                    <span>
                      <b> Danger - </b> <?=$error?></span>
                  </div>
            <?php endif?>
            <form action="" method="post">
              <div style="padding:10px;max-width:400px">
                  <input class="form-control" placeholder="Menu basligi" type="text" name="menu_title" value="<?=post('menu_title') ? post('menu_title') : $row['menu_title'] ?>" placeholder="Menu Basligi">
              </div> 
              <ul id="menu" class="menu">
                  <?php foreach($menuData as $key=>$menu):?>
                    <li>  
                        <div class="handle"><i class="material-icons">sync_alt</i></div>
                        <div class="menu-item"> 
                                <a href="#" class="delete-menu"><i class="material-icons">delete</i></a>
                                <input type="text" name="title[]" value="<?=$menu['title'] ?>" placeholder="Menu Adi" class="form-control">
                                <input type="text" name="url[]" value="<?=$menu['url'] ?>"  placeholder="Menu Linki" class="form-control">
                        </div> 
                        <div class="sub-menu"><ul class="menu">
                            <?php if(isset($menu['submenu'])):?>
                                <?php foreach($menu['submenu'] as $key2=>$submenu):?>
                                <li>
                                <div class="handle"><i class="material-icons">sync_alt</i></div>
                                    <div class="menu-item">
                                        <a href="" class="delete-menu"><i class="material-icons">delete</i></a>
                                        <input type="text" name="sub_title_<?=$key?>[]" value="<?=$submenu['title']?>" placeholder="Alt Menu Adi(+)" class="form-control">
                                        <input type="text" name="sub_url_<?=$key?>[]" value="<?=$submenu['url']?>"  placeholder="Alt Menu Linki(+)" class="form-control">
                                    </div>
                                </li> 
                                <?php endforeach?>
                            <?php endif?> 
                        </ul></div>  
                      <a href="#" class="btn btn-warning add_submenu" >Alt Menu Ekle </a>  
                    </li> 
                  <?php endforeach?>
              </ul> 
                <div class="menu-btn">
                  <a href="#" id="add_menu" class="btn btn-success"> Menu Ekle </a>
                  <button type="submit" value="1" name="submit" class="btn btn-info">Kaydet</button>
                </div>     
           </form> 
            </div>
        </div>
      </div> 
    </div>
  </div>
</div>

<?php require_once admin_view('static/footer')?>
<script>
$(function(){
    $('#add_menu').on('click',function(e){
      $("#menu").append('<li>\n' +
                '<div class="handle"><i class="material-icons">sync_alt</i></div>\n'+
                '<div class="menu-item">\n' +
                     '<a href="" class="delete-menu"><i class="material-icons">delete</i></a>\n' +
                        '<input type="text"  name="title[]" placeholder="Menu Adi" class="form-control">\n' +
                        '<input type="text"  name="url[]" placeholder="Menu Linki" class="form-control">\n' +
                '</div>\n' +
                    '<div class="sub-menu"><ul class="menu"></ul></div>\n'+
                    '<a href="" class="btn btn-warning add_submenu">Alt Menu Ekle </a>\n' +
                '</li> '); 
      e.preventDefault();
    });

    $(document.body).on('click' , '.add_submenu',function(e){
      var $index=$(this).closest('li').index(); 
      $(this).prev('.sub-menu').find('ul').append('<li>\n'+
                            '<div class="handle"><i class="material-icons">sync_alt</i></div>\n'+
                            '<div class="menu-item">\n'+
                                '<a href="" class="delete-menu"><i class="material-icons">delete</i></a>\n'+
                                '<input type="text" name="sub_title_'+$index+'[]" placeholder="Alt Menu Adi(+)" class="form-control">\n'+
                                '<input type="text" name="sub_url_'+$index+'[]"" placeholder="Alt Menu Linki(+)" class="form-control">\n'+
                            '</div>\n'+
                        '</li>')

       e.preventDefault();
    });
   
   $(document.body).on('click' , '.delete-menu',function(e){ 
        if($('#menu li').length===1){
            alert("En azi bir dene Menu olmalidir");
        }else{
            $(this).closest('li').remove();
        }
        e.preventDefault();
    });

});
</script>