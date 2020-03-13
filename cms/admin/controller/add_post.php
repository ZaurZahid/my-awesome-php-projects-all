<?php
if(!permission('posts','add')){
    permission_page();
}
$categories=$db->from('categories')
               ->orderby("category_name",'ASC')
               ->all();
   
$allTags=$db->from('tags')
            ->orderby("tag_id",'DESC')
            ->all();         
$tagsArr=[];
foreach($allTags as $tags){
    $tagsArr[]=trim(htmlspecialchars($tags['tag_name']));
} 

if(post('submit')){
  $post_title=post('post_title');
  $post_content=post('post_content');
  $post_short_content=post('post_short_content'); 
  $post_status=post('post_status');
  $post_categories=post('post_categories');
  $post_tags=post('post_tags'); 
  $post_url=permalink(post('post_url'));
    if(!$post_url){
        $post_url=permalink(post('post_title'));
    }
  $post_seo=json_encode(post('post_seo'));
    
  if(!$post_content || !$post_url ){
      $error="Lutfen butun alanlari yazin.";
   }else{

    $post_categories=implode(',' , post('post_categories'));

    //bele bir movzunun olub olmadigni yoxla
    $query=$db->from('posts')
              ->where('post_url',$post_url) 
              ->first();
    if($query){
        $error='<strong style="color:red;">'.$post_title.'</strong> adinda bir movzu onsuzda var ,basqa adda sehife yazin';
    }else{
        $query=$db->insert('posts')
                  ->set([
                      'post_title'=>$post_title,
                      'post_content'=>$post_content,
                      'post_short_content'=>$post_short_content,
                      'post_status'=>$post_status,
                      'post_url'=>$post_url,
                      'post_categories'=>$post_categories,
                      'post_seo'=>$post_seo
                  ]);
        if($query){
            
            $post_ID = $db->lastId();
            //etiketleri kontrol et ve ekle
            $post_tags=array_map('trim',explode(",",$post_tags));
            $post_tags=array_filter($post_tags);
            if(count($post_tags)>0){
                 foreach($post_tags as $tag){
                    //etiket varmi
                    $row=$db->from('tags')
                            ->where('tag_url',permalink($tag))
                            ->first();
                    if(!$row){
                        $tagInsert=$db->insert('tags')
                           ->set([
                               'tag_name'=>$tag,
                               'tag_url'=>permalink($tag)
                           ]);
                       $tagId= $db->lastId();
                    }else{
                         $tagId=$row['tag_id'];
                    }

            //konuya aid etiket varmi?    
                    $row2=$db->from('post_tags')
                             ->where('tag_post_id',$post_ID)
                             ->where('tag_id',$tagId)
                             ->first(); 
                            
                    if(!$row2){
                        $db->insert('post_tags')
                        ->set([
                            'tag_post_id'=>$post_ID,
                            'tag_id'=>$tagId
                        ]);
                    } 
                }
            }
               
            header('location:'.admin_url('posts'));
        }else{
            $error="Ne ise bir xeta oldu.";
        }          

       }


   }

}

require admin_view('add_post');

?>