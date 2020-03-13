<?php
$category_url=route(2);
if(!$category_url){
    header('location:'.site_url('404'));
    exit;
}

$category=$db->from('categories')
        ->where('category_url',$category_url)
        ->first(); 

if(!$category){
header('location:'.site_url('404'));
exit;
}  

$seo=json_decode($category['category_seo'],true);

$meta=[
    'title'=>$seo['title'] ? $seo['title'] : $category['category_name'],
    'description'=>$seo['description'] ? cut_text($seo['description'],220) : null
];

// pagination example
$totalRecord = $db->from('posts')
                  ->select('count(DISTINCT post_id) as total')
                  ->join('categories','find_in_set(categories.category_id,posts.post_categories)')
                  ->where('post_status',1)
                  ->find_in_set($category['category_id'],'post_categories') 
                  ->total();
$pageLimit = 5;
$pageParam = 'sayfa';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);
$query = $db->from('posts') 
            ->select('posts.*,GROUP_CONCAT(category_name SEPARATOR ", ") as category_name,GROUP_CONCAT(category_url SEPARATOR ", ") as category_url ')
            ->join('categories','find_in_set(categories.category_id,posts.post_categories)')
            ->where('post_status',1)
            ->find_in_set($category['category_id'],'post_categories')
            ->groupby('posts.post_id')
            ->orderby('post_id', 'DESC')
            ->limit($pagination['start'], $pagination['limit'])
            ->all();

   //hansi categoriye giriremse ,bu categorilerin icinde olan postlarin ,etiketlerini yazdir
   //(where=categori-nin url-si ile categori id-sini tapiram ,,,,,, mes:categori=3
  //find_in_set ile hansi postlarda bu categorinin id si oldugunu tapiram ,,,,,mes:(3 harda isledilib)=>tutaqki 20,21,5 de
  //ve where(tag_post_id si  burda isledilen postlarin id sine beraberdir))  mes:tag_post_id 20 VE 21 VE 5 olanlari gotur       
  $get=route(2); 
  foreach($query as $val){
    /* echo */ $p_id= $val['post_id']." ";  

$allTags=$db->from('post_tags')   
            ->join('posts','posts.post_id=post_tags.tag_post_id')
            ->join('tags','tags.tag_id=post_tags.tag_id')
            ->join('categories','find_in_set(categories.category_id,posts.post_categories)')
            ->where('tag_post_id',$p_id,"&&")  
            ->where('category_url',$get)   
            ->all(); 
} 
require view('blog-kategory');
?>