<head> 
        <link rel="stylesheet" href="<?=admin_public_url('styles/menu.css')?>">
        <link rel="stylesheet" href="<?=admin_public_url('styles/font-awesome-4.7.0.min.css')?>">
 </head>
<?php require_once admin_view('static/header')?>
    
<div class="box-menu-container">
    <h2 style="font-size:23px">Menu Duzenleme(#<?=$id?>)</h2>
    <form action="" method="post">
        <div style="padding:10pxmax-width:400px">
            <input type="text" name="menu_title" value="<?=post('menu_title')?post('menu_title'):$row['menu_title']?>" placeholder="Menu Basligi">
         </div>
         <ul id="menu" class="menu">
         
            <?php foreach($menuData as $key=>$menu):?> 
                     <li> 
                     <div id="handle"></div>
                        <div class="menu-item"> 
                                <a href="" class="delete-menu"><i class="fa fa-times-circle"></i></a>
                                <input type="text" name="title[]" value="<?= $menu['title']?>" placeholder="Menu Adi">
                                <input type="text" name="url[]"value="<?= $menu['url']?>"  placeholder="Menu Linki">
                        </div> 
                        <div class="sub-menu">
                        <ul class="menu">
                            <?php if(isset($menu['submenu'])):?>  
                                <?php foreach($menu['submenu'] as $k=>$submenu):?>
                                    <li>  
                                       <div id="handle"></div>
                                        <div class="menu-item"> 
                                            <a href="" class="delete-menu"><i class="fa fa-times-circle"></i></a> 
                                            <input type="text" name="sub_title_<?=$key?>[]" value="<?= $submenu['title']?>" placeholder="Alt Menu Adi(+)"> 
                                            <input type="text" name="sub_url_<?=$key?>[]" value="<?= $submenu['url']?>" placeholder="Alt Menu Linki(+)"> 
                                        </div> 
                                    </li>     
                               <?php endforeach ?>   
                            <?php endif?>
                        </ul></div>
                        <a href="" class="btn add_submenu">Alt Menu Ekle </a>
                     </li> 
           <?php endforeach ?>   
         </ul> 
        <div class="menu-btn">
            <a href="" id="add_menu"> Menu Ekle </a>
            <button type="submit" value="1" name="submit">Kaydet</button>
        </div>    
    </form>
 
</div>
<script>
$(function(){
    $('#add_menu').on('click',function(e){
        $("#menu").append('<li>\n' +
                '<div id="handle"></div><div class="menu-item">\n' +
                     '<a href="" class="delete-menu"><i class="fa fa-times-circle"></i></a>\n' +
                                    '<input type="text"  name="title[]" placeholder="Menu Adi">\n' +
                                    '<input type="text"  name="url[]" placeholder="Menu Linki">\n' +
                '</div>\n' +
                '<div class="sub-menu"> <ul class="menu"> </ul> </div>\n' +
                    '<a href="" class="btn add_submenu">Alt Menu Ekle </a>\n' +
                '</li> ');
        $('.menu').sortable(); 
        e.preventDefault();
    });
    $(document.body).on('click' , '.add_submenu',function(e){
        var $index=$(this).closest('li').index();
        $(this).prev('.sub-menu').find('ul').append('<li>\n'+
                            '<div id="handle"></div><div class="menu-item">\n'+
                                '<a href="" class="delete-menu"><i class="fa fa-times-circle"></i></a>\n'+
                                '<input type="text" name="sub_title_'+$index+'[]" placeholder="Alt Menu Adi(+)">\n'+
                                '<input type="text" name="sub_url_'+$index+'[]" placeholder="Alt Menu Linki(+)">\n'+
                            '</div>\n'+
                        '</li>'); 
                e.preventDefault();
            });

    $(document.body).on('click' , '.delete-menu',function(e){
        if($('#menu li').length===1){
            alert("En azi bir dene Menu olmalidir");
        }else{
             $(this).closest('li').remove();
        }
        e.preventDefault();
    })
})
</script>


<?php require_once admin_view('static/footer')?>