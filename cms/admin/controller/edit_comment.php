<?php
if(!permission('comments','edit')){
    permission_page();
} 
$id=get('id');

    if(!$id){
        header("location:".admin_url('comments'));
        exit;
    }

$row=$db->from('comments') 
    ->join('posts','posts.post_id=comments.comment_post_id') 
    ->join('users','users.user_id=comments.comment_user_id','left')
    ->where('comment_id',$id)
    ->first(); 

    if(!$row){
        header("location:".admin_url('comments'));
        exit;
    }

if(post('submit')){ 
    $comment_status=post('comment_status');
    $comment_content=post('comment_content');
    $query=$db->update('comments')
                ->where('comment_id',$id)
                ->set([
                    'comment_status'=>$comment_status,
                    'comment_content'=>$comment_content
                ]);
    if($query){
        header('location:'.admin_url('comments'));
    }else{
        $error="Bir sorun olustu.";
    }
         
}  
  
require admin_view('edit-comment');
?>