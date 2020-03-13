<?php

if($post_url=route(2)){
    require controller('post-detail');  
}else{
        
    $meta=[
        'title'=>"ITS-Xeberler" 
    ];  
    //url-den lazim olani goturmek
    $route_break=array_values(array_filter(explode('/',$_SERVER['REQUEST_URI']))); 
    $route_url=ltrim($_SERVER['REQUEST_URI'],'/'.$route_break[0].'/');
    // pagination example
    $totalRecord = $db->from('posts')
                    ->select('count(post_id) as total')
                    ->total(); 
    
    $pageLimit = 5;
    $pageParam = 'page';
    $pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);
    $query = $db->from('posts')
            ->where('post_menu',$route_url)
            ->where('post_status',1)
            ->orderby('post_id', 'DESC')
            ->limit($pagination['start'], $pagination['limit'])
            ->all(); 
        
    require view('xeberler');
}

?>
