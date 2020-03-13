<?php
if(!permission('tags','show')){
    permission_page();
} 

// pagination example
$totalRecord = $db->from('tags')
                  ->select('count(tag_id) as total')
                  ->total();
$pageLimit = 10;
$pageParam = 'sayfa';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);
$query = $db->from('tags')
            ->select('tags.*,count(post_tags.id) as total') 
            ->join('post_tags','tags.tag_id=post_tags.tag_id','left')
            ->groupby('tags.tag_id')
            ->orderby('tag_id', 'DESC')
            ->limit($pagination['start'], $pagination['limit'])
            ->all();
 
require admin_view('tags');

?>