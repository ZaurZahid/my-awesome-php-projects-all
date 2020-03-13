<?php
if(!permission('pages','add')){
    permission_page();
}
if(post('submit')){ 
  $page_title=post('page_title');
  $page_content=post('page_content');
  $page_url=permalink(post('page_url'));
  $page_menu=post('page_menu');
    if(!$page_url){
        $page_url=permalink(post('page_title'));
    }
  $page_seo=json_encode(post('page_seo')); 
  if(!$page_content || !$page_url ){
      $error="Lutfen butun alanlari yazin.";
   }else{
    //bele bir kategorinin olub olmadigni yoxla
    $query=$db->from('pages')
              ->where('page_url',$page_url)
              ->first();
    if($query){
        $error='<strong style="color:#00fffa;font-size:24px">'.$page_title."(".$page_url."-urlsinda)".'</strong> adinda bir sehife onsuzda var ,basqa adda sehife yazin';
    }else{
        $query=$db->insert('pages')
                  ->set([
                      'page_title'=>$page_title,
                      'page_content'=>$page_content,
                      'page_url'=>$page_url,
                      'page_menu'=>$page_menu,
                      'page_seo'=>$page_seo
                  ]);
        if($query){
            header('location:'.admin_url('pages'));
        }else{
            $error="Ne ise bir xeta oldu.";
        } 
       } 
   } 
} 
require admin_view('add-page'); 
?>