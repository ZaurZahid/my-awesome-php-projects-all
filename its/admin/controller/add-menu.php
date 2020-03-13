<?php
if(!permission('menu','add')){
    permission_page();
} 
if(post('submit')){
    $menu_title=post('menu_title');
    if(!$menu_title){
        $error="Menu basligini yazmalisiz.";
    }
    elseif(count(array_filter(post('title')))==0){
        $error="En az bir menu yazmalisiz.";
    }else{
        $menu=[];
        $urls=post('url');
        foreach(post('title') as $key=>$title){
            $arr=[
                'title'=>$title,
                'url'=>$urls[$key]
            ];
                if(post('sub_title_'.$key)){
                    $sub_arr=[];
                        $sub_urls=post('sub_url_'.$key);
                        foreach(post('sub_title_'.$key) as $key2=>$title2){
                            if(!empty($title2)){ 
                                //$sub_arr[] bele yaziramki,array kimi etsin yeni [0],[1] ve sonrada submenu=>ya eleve edirem ARRAYI
                                //ele bilki,  $menu[]=$arr;  bu sohbeti burda edirsen
                                 $sub_arr[]=[
                                    'title'=>$title2,
                                    'url'=>$sub_urls[$key2]
                                    ];
                            } 
                            $arr['submenu']=$sub_arr;
                        } 
                    }  
            $menu[]=$arr; 
        } 
       /*  print_r($menu); */
   
  //db-ye yazdir
    $query=$db->insert('menu') 
    ->set([
        'menu_title'=>$menu_title,
        'menu_content'=>json_encode($menu)
    ]);
    if($query){
        header('Location:'.admin_url('menu'));
    }else{
        $error="Ne ise bir problem oldu ,islem alinmadi";
    }  
   }
 } 



require admin_view('add-menu');

?>