<?php
if(!permission('posts','show')){
    permission_page();
} 

// pagination example
$totalRecord = $db->from('posts')
                  ->select('count(post_id) as total')
                  ->total();
$pageLimit = 2;
$pageParam = 'sayfa';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);
$query = $db->from('posts') 
            ->orderby('post_id', 'DESC')
            ->limit($pagination['start'], $pagination['limit'])
            ->all();
 
require admin_view('posts');

?>