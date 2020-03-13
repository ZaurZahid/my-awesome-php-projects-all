<?php
$row=Blog::findPost($post_url);
if(!$row){
    header('location:'.site_url('404'));
    exit;
}

$seo=json_decode($row['post_seo'],true); 
$meta=[
    'title'=>$seo['title'] ? $seo['title'] : $row['post_title'],
    'description'=>$seo['description'] ? cut_text($seo['description'],220) : cut_text($row['post_short_content'],220)
];
//yorumlar
$comments=$db->from('comments')
             ->where('comment_post_id',$row['post_id'])
             ->where('comment_status',1)
             ->orderby('comment_id','ASC')
             ->all();

require view('blog-detail');

?>