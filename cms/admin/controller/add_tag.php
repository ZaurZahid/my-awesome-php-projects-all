<?php
if(!permission('tags','add')){
    permission_page();
}
  
if(post('submit')){

  $tag_name=post('tag_name'); 
  $tag_url=permalink(post('tag_url'));
    if(!$tag_url){
        $tag_url=permalink(post('tag_name'));
    }
  $tag_seo=json_encode(post('tag_seo'));
    
  if(!$tag_name || !$tag_url ){
      $error="Lutfen butun alanlari yazin.";
   }else{
    //bele bir kategorinin olub olmadigni yoxla
    $query=$db->from('tags')
              ->where('tag_url',$tag_url)  
              ->first();
    if($query){
        $error='<strong style="color:red;">'.$tag_name.'</strong> adinda bir tag onsuzda var ,basqa adda tag yazin';
    }else{
        $query=$db->insert('tags') 
                  ->set([
                      'tag_name'=>permalink($tag_name), 
                      'tag_url'=>$tag_url,
                      'tag_seo'=>$tag_seo
                  ]);
        if($query){
            header('location:'.admin_url('tags'));
        }else{
            $error="Ne ise bir xeta oldu.";
        }          

       }


   }

} 
require admin_view('add_tag');

?>