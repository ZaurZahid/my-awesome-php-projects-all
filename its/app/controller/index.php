<?php
$meta=[
    'title'=>setting('title'),
    'description'=>setting('description'),
    'keywords'=>setting('keywords')
];
$query3=$db->from('partners') 
           ->orderby('partners_id','asc')
           ->limit(0,4)
           ->all();
$query4 = $db->from('posts')  
            ->where('post_status',1) 
            ->limit(0,3)
            ->all(); 

require view('index');
?>