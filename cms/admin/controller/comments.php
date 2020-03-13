<?php
if(!permission('comments','show')){
    permission_page();
} 

// pagination example
$totalRecord = $db->from('comments')
                  ->select('count(comment_id) as total');
if($status=get('status')){
    $totalRecord = $db->where('comment_status',($status==2 ? 2 : $status));
}   
$totalRecord = $db->total();


$pageLimit = 5;
$pageParam = 'sayfa';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);
$query = $db->from('comments')
            ->join('posts','posts.post_id=comments.comment_post_id') 
            ->join('users','users.user_id=comments.comment_user_id','left'); 
if($status=get('status')){
    $query = $db->where('comment_status',($status==2 ? 2 : $status));
}   
$query = $db->orderby('comment_id', 'DESC')
            ->limit($pagination['start'], $pagination['limit'])
            ->all();
 
require admin_view('comments');

?>