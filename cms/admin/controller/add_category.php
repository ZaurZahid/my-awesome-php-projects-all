<?php
if(!permission('categories','add')){
    permission_page();
}
if(post('submit')){

  $category_name=post('category_name');
  $category_url=permalink(post('category_url'));
    if(!$category_url){
        $category_url=permalink(post('category_name'));
    }
  $category_seo=json_encode(post('category_seo'));
    
  if(!$category_name || !$category_url ){
      $error="Lutfen kategori adini yazin.";
   }else{
    //bele bir kategorinin olub olmadigni yoxla
    $query=$db->from('categories')
              ->where('category_url',$category_url)
              ->first();
    if($query){
        $error='<strong style="color:red;">'.$category_name.'</strong> adinda bir kategori onsuzda var ,basqa adda kategori yazin';
    }else{
        $query=$db->insert('categories')
                  ->set([
                      'category_name'=>$category_name,
                      'category_url'=>$category_url,
                      'category_seo'=>$category_seo
                  ]);
        if($query){
            header('location:'.admin_url('categories'));
        }else{
            $error="Ne ise bir xeta oldu.";
        }          

       }


   }

}

require admin_view('add_category');

?>