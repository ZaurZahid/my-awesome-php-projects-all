<?php 

$name=post('name');
$email=post('email');
$postId=post('post_id');
$comment=post('comment');
if(session('user_id')){
    $name=session('user_name');
    $email=session('user_email');
}
if(!$name || !$email || !$postId){
    $json['error']="Emailinizi ve adinizi gonderin."; 
}elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $json['error']="Emailiniz uygun gelmedi ,tezeden gonderin.";
}elseif(!$comment){
    $json['error']="Yorum yazilmayib";
}
else{
        if(session('user_id')){
            $status=setting('user_comment')==1 ? 1 :2;
        } else{
            $status=setting('visitor_comment')==1 ? 1 :2;
        }

        //ilgili blog konusunu bul
        $row=Blog::findPostbyId($postId);

        if(!$row){
            $json['error']="Ne ise bas verdi , sehifeni tezeden yenileyin.";
        }else{

            $comment=[
                'comment_user_id'=>session('user_id'),
                'comment_post_id'=>$postId,
                'comment_name'=>$name,
                'comment_email'=>$email,
                'comment_content'=>$comment,
                'comment_status'=>$status 
            ];

              $query=$db->insert('comments')
              ->set($comment);
              if($query){
                  if($status==2){
                    $json['success']="Yorumunuz onay bekliyir,yaziginiz ucun tesekkurler";
                  }
                  else{
                      $comment['comment_date']=date('Y-m-d H:i:s');
                    ob_start();
                       require view('static/comment');
                    $output=ob_get_clean();
                    $json['comment']=$output;
                  }
              }else{
                $json['error']="Ne ise bas verdi ,tezeden gonderin.";
              }
        }
  
    }
  
?>