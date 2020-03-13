<?php
if(route(1)=='kategori'){
    require controller('blog-kategory');
}else{
    if($post_url=route(1)){
        require controller('blog-detail');
    }else{ 
        $meta=[
            'title'=>"Blog"
        ]; 
// pagination example
$totalRecord = $db->from('posts')
                  ->select('count(post_id) as total')
                  ->where('post_status',1)
                  ->total();
$pageLimit = 2;
$pageParam = 'sayfa';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);
$query = $db->from('posts') 
            ->select('posts.*,GROUP_CONCAT(category_name SEPARATOR ", ") as category_name,GROUP_CONCAT(category_url SEPARATOR ", ") as category_url ')
            ->join('categories','find_in_set(categories.category_id,posts.post_categories)')
            ->where('post_status',1)
            ->groupby('posts.post_id')
            ->orderby('post_id', 'DESC')
            ->limit($pagination['start'], $pagination['limit'])
            ->all(); 
$allTags=$db->from('tags')
            ->select('tags.*,count(post_tags.id) as total') 
            ->join('post_tags','tags.tag_id=post_tags.tag_id','left')
            ->groupby('tags.tag_id')
            ->orderby("tag_id",'DESC')
            ->all();   
            
require view('blog');
 
    }  
}

?>