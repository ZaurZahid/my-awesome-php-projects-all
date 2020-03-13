<?php
if(!permission('menu','edit')){
    permission_page();
} 
$id = get('id');
if(!$id){
    header("Location:".admin_url('menu'));
    exit;
}
$query=$db->prepare("SELECT*FROM menu where menu_id=:id  ");
$query->execute([
    'id'=>$id
]);
$row=$query->fetch(PDO::FETCH_ASSOC); 
if(!$row){
    header("Location:".admin_url('menu'));
    exit;
}

if(post('submit')){
    $menu=[];
    $menu_title=post('menu_title');
    if(!$menu_title){
        $error="Menu Basligini yazin";
    }
    elseif(count(array_filter(post('title')))==0){
        $error="En az bir menu yazmalisiz.";
    }
    else{
    $urls=post('url');
    foreach(post('title') as $key=>$title){
        $arr=[
            'title'=>$title,
            'url'=>$urls[$key]
        ];
                if(array_filter(post('sub_title_'.$key))){
                    
                    $submenu=[];
                    $suburls=array_filter(post('sub_url_'.$key));
                    foreach(post('sub_title_'.$key) as $k=>$sub_title){
                        $submenu[]=[
                            'title'=>$sub_title,
                            'url'=>$suburls[$k]
                        ];
                        $arr['submenu']=$submenu;
                    }
                }
        $menu[]=$arr;
    }
    //databaseye GUNCELLEME
    $query=$db->prepare('UPDATE menu SET menu_title=:menu_title,  menu_content=:menu_content WHERE menu_id=:id');
    $ekle=$query->execute([ 
        'menu_title'=>$menu_title,
        'menu_content'=>json_encode(array_filter($menu)),
        'id'=>$id
    ]);
    if($ekle){
        header('Location:'.admin_url('menu'));
    }else{
        $error="Ne ise bir problem oldu ,islem guncelenemedi";
    }
  }
}
$menuData=json_decode($row['menu_content'],true);
require admin_view('edit-menu');

?>