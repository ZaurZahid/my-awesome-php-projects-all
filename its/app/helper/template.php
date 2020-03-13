<?php
 
function site_url($url=false){
    return URL . '/' . $url;
}
function public_url($url=false){
    return URL . '/app/public/'. $url; //*
}  
function error(){
   global $error;
   return isset($error) ? $error : false;
}
function success(){
    global $success;
    return isset($success) ? $success : false;
 } 
function menu($id){
    global $db;
    $query=$db->from('menu')
              ->where('menu_id',$id)
              ->first();
     if($query){
         $data=json_decode($query['menu_content'],true);
         return $data;
     }else{
        return false;
    }        
}
 function listeli_li($get_url){
    foreach(menu(19) as $key=>$menu){
    if($menu['url']==$get_url && isset($menu['submenu'])){
        foreach($menu['submenu'] as $key2=>$submenu){ ?> 
        <li <?=('/its/'.route(0).'/sayfa/'.route(2)==$submenu['url'] ? 'class="active"':null)?('/its/'.route(0).'/sayfa/'.route(2)==$submenu['url'] ? 'class="active"':null):('/its/'.route(0).'/'.route(1)==$submenu['url'] ? 'class="active"':null) ?>><a href="<?=$submenu['url']?>"><?=$submenu['title']?></a></li>  
        <?php } ?> 
        
    <?php  } }  ?>
 <?php }
?>