<?php
$page_url=route(2);
if(!$page_url){
    header('location:'.site_url('404'));
    exit;
}

$row=$db->from('pages')
        ->where('page_url',$page_url)
        ->first(); 
if(!$row){
    header('location:'.site_url('404'));
    exit;
}
$content=$row['page_content'];
$seo=json_decode($row['page_seo'],true);
$meta=[
    'title'=>'ITS-'.($seo['title'] ? $seo['title'] : $row['page_title']),
    'description'=>$seo['description'] ? cut_text($seo['description'],210) : cut_text($row['page_content'],210) 
];
require view('sayfa');
?> 
 