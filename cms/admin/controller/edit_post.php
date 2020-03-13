<?php
if(!permission('posts','edit')){
    permission_page();
}

$id=get('id');

    if(!$id){
        header("location:".admin_url('posts'));
        exit;
    }
$row=$db->from('posts')
            ->where('post_id',$id) 
            ->first();
    if(!$row){
        header("location:".admin_url('posts'));
        exit;
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

//etiketler
$tags=$db->from('post_tags')
         ->join('tags','post_tags.tag_id=tags.tag_id')
         ->where('tag_post_id',$id)
         ->all(); 

$postTags=[];
foreach($tags as $tag){
$postTags[].=trim(htmlspecialchars($tag['tag_name']));
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
              ->where('post_id',$id,"!=") 
              ->first();
    if($query){
        $error='<strong style="color:red;">'.$post_title.'</strong> adinda bir movzu onsuzda var ,basqa adda sehife yazin';
    }else{
        $query=$db->update('posts')
                  ->where('post_id',$id)
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
            
            $post_ID = $id;
            
            $post_tags=array_map('trim',explode(",",$post_tags));
            $post_tags=array_filter($post_tags); 
            if(count($post_tags)>0){ 
            //etiketleri kontrol et ve ekle 
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
                       $tagId=$db->lastId();
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
            //silinen etiketleri kontrol et 
            $diffs=array_diff($postTags,$post_tags);
                if(count($diffs)>0){
                    foreach($diffs as $diff){
                       foreach($allTags as $allTag){
                          if(trim($allTag['tag_name'])==$diff){
                             $db->delete('post_tags')
                                ->where('tag_post_id',$id)
                                ->where('tag_id',$allTag['tag_id'])
                                ->done();
                           }
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

$seo=json_decode($row['post_seo'],true);
require admin_view('edit_post');

?>