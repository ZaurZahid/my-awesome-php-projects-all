<?php

$row=Blog::find_post_by_url($post_url); 
if(!$row){
    header('location:'.site_url('404'));
    exit;
}
$seo=json_decode($row['post_seo'],true); 
$meta=[
    'title'=>$seo['title'] ? $seo['title'] : $row['post_title'],
    'description'=>$seo['description'] ? cut_text($seo['description'],220) : cut_text($row['post_short_content'],220)
];

require view('post-detail'); 

?>