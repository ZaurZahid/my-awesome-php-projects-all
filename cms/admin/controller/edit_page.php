<?php
if(!permission('pages','edit')){
    permission_page();
}

$id=get('id');

    if(!$id){
        header("location:".admin_url('pages'));
        exit;
    }
$row=$db->from('pages')
            ->where('page_id',$id) 
            ->first();
    if(!$row){
        header("location:".admin_url('pages'));
        exit;
    } 
if(post('submit')){

  $page_title=post('page_title');
  $page_content=post('page_content');
  $page_url=permalink(post('page_url'));
    if(!$page_url){
        $page_url=permalink(post('page_title'));
    }
  $page_seo=json_encode(post('page_seo'));
    
  if(!$page_title || !$page_url ){
      $error="Lutfen butun alanlari yazin.";
   }else{
    //bele bir kategorinin olub olmadigni yoxla
    $query=$db->from('pages')
              ->where('page_url',$page_url) 
              ->where('page_id',$id,'!=')
              ->first();
    if($query){
        $error='<strong style="color:red;">'.$page_title.'</strong> adinda bir sehife onsuzda var ,basqa adda sehife yazin';
    }else{
        $query=$db->update('pages')
                  ->where('page_id',$id)
                  ->set([
                      'page_title'=>permalink($page_title),
                      'page_content'=>$page_content,
                      'page_url'=>$page_url,
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
$seo=json_decode($row['page_seo'],true);
require admin_view('edit_page');

?>