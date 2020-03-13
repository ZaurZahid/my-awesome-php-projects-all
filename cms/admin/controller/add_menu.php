<?php
if(!permission('menu','add')){
    permission_page();
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
    //databaseye yazdirma
    $query=$db->prepare('INSERT INTO menu SET menu_title=:menu_title,  menu_content=:menu_content');
    $ekle=$query->execute([
        'menu_title'=>$menu_title,
        'menu_content'=>json_encode($menu)
    ]);
    if($ekle){
        header('Location:'.admin_url('menu'));
    }else{
        $error="Ne ise bir problem oldu ,islem alinmadi";
    }
  }
}

require admin_view('add_menu');

?>