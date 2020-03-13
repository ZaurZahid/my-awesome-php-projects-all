<?php
function admin_controller($controllerName){
    $controllerName=strtolower($controllerName);
    return PATH.'/admin/controller/'.$controllerName.'.php';
}

function admin_view($viewName){
    $viewName=strtolower($viewName);
    return PATH.'/admin/view/'.$viewName.'.php';
}
 

function admin_url($url=false){
    return URL . '/admin/' . $url;
}
function admin_public_url($url=false){
    return URL . '/admin/public/' . $url;
}
 
function setting($name){
    global $settings ;
    return isset($settings[$name]) ? $settings[$name] : false;
}
function user_ranks($rankId=null){
    $ranks=[
        '1'=>'Developer',
        '2'=>'Admin',
        '3'=>'Kullanici'
    ];
    return $rankId ? $ranks[$rankId] : $ranks;
}
//sehifenlerin idaresi ucun=> gorub gormemek ucun
function permission($url,$action){ //('index','show') indexde show varmi?
    $permissions=json_decode(session('user_permissions'),true);
    if($permissions[$url][$action]){//eger varsa goster yoxdusa kes;
        return true; 
    }
    return false; 
}
function permission_page(){
    die("Bura girisiniz yoxdur.");
    exit;
}
?>