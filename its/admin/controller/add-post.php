<?php
if(!permission('posts','add')){
    permission_page();
}
if(post('submit')){ 
    $post_title=post('post_title');
    $post_content=post('post_content');
    $post_short_content=post('post_short_content'); 
    $post_status=post('post_status');
    $post_menu=post('post_menu'); 
    $post_url=permalink(post('post_url'));
    if(!$post_url){
        $post_url=permalink(post('post_title'));
    }
  $post_seo=json_encode(post('post_seo')); 
  if(!$post_content || !$post_url || !$post_menu){
      $error="Lutfen butun alanlari yazin.";
   }else{
    //bele bir kategorinin olub olmadigni yoxla
    $query=$db->from('posts')
              ->where('post_url',$post_url)
              ->first();
    if($query){
        $error='<strong style="color:#00fffa;font-size:24px">'.$post_title."(".$post_url."-urlsinda)".'</strong> adinda bir sehife onsuzda var ,basqa adda sehife yazin';
    }else{
        $query=$db->insert('posts')
                  ->set([
                      'post_title'=>$post_title,
                      'post_content'=>$post_content,
                      'post_short_content'=>$post_short_content,
                      'post_status'=>$post_status,
                      'post_url'=>$post_url,
                      'post_menu'=>$post_menu,
                      'post_seo'=>$post_seo
                  ]);
        if($query){
            header('location:'.admin_url('posts'));
        }else{
            $error="Ne ise bir xeta oldu.";
        } 
       } 
   } 
} 
require admin_view('add-post'); 
?>