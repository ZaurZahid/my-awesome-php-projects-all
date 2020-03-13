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
function user_ranks($rankId=null){
        $ranks=[
            '1'=>'CEO',
            '2'=>'Developer'
        ];
    return $rankId ? $ranks[$rankId] : $ranks; 
}
function permission($url,$key){
    $permissions=json_decode(session('user_permissions'),true);
    if(isset($permissions[$url][$key])){
        return true;
    }else{
        return false;
    }
}
function permission_page(){
    die("Sene demisemki bura gire bilmiyiceysen....");
    exit;
}

 
?>