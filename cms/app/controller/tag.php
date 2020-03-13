<?php
 $tag_url=route(1);
 
if(!$tag_url){
    header('location:'.site_url('404'));
    exit;
}

$tag=$db->from('tags')
        ->where('tag_url',$tag_url)
        ->first(); 

if(!$tag){
header('location:'.site_url('404'));
exit;
}  

$seo=json_decode($tag['tag_seo'],true);

$meta=[
    'title'=>$seo['title'] ? $seo['title'] : $tag['tag_name'],
    'description'=>$seo['description'] ? cut_text($seo['description'],220) : null
];

// pagination example
  $totalRecord = $db->from('posts')
                  ->select('count(DISTINCT post_id) as total')
                  ->join('categories','find_in_set(categories.category_id,posts.post_categories)')
                  ->join('post_tags','post_tags.tag_post_id=posts.post_id')
                  ->join('tags','tags.tag_id=post_tags.tag_id')
                  ->where('post_status',1)
                  ->where('tag_url',$tag['tag_url']) 
                  ->total();
$pageLimit = 1;
$pageParam = 'sayfa';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);  
$query = $db->from('posts') 
            ->select('posts.*,GROUP_CONCAT(category_name SEPARATOR ", ") as category_name,GROUP_CONCAT(category_url SEPARATOR ", ") as category_url ')
            ->join('categories','find_in_set(categories.category_id,posts.post_categories)')
            ->join('post_tags','post_tags.tag_post_id=posts.post_id')
            ->join('tags','tags.tag_id=post_tags.tag_id')
            ->where('post_status',1)
            ->where('tag_url',$tag['tag_url']) 
            ->groupby('posts.post_id')
            ->orderby('post_id', 'DESC')
             ->limit($pagination['start'], $pagination['limit'])  
            ->all();

require view('tag');
 
   

?>