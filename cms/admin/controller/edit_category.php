<?php
if(!permission('categories','edit')){
    permission_page();
}

$id=get('id');
if(!$id){
    header('location:'.admin_url('categories'));
    exit;
}
$row=$db->from('categories')
->where('category_id',$id)
->first();
if(!$row){
    header('location:'.admin_url('categories'));
    exit;
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
              ->where('category_id',$id ,'!=')
              ->first();
    if($query){
        $error='<strong style="color:red;">'.$category_name.'</strong> adinda bir kategori onsuzda var ,basqa adda kategori yazin';
    }else{
        $query=$db->update('categories')
                  ->where('category_id',$id)
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
$category_seo=json_decode($row['category_seo'],true);

require admin_view('edit-category'); 
?>