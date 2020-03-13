<?php
$table=get('table');
$column=get('column');
$id=get('id');

if(!permission($table,'delete')){
    permission_page();
} 
$query=$db->delete($table)
          ->where($column,$id)
          ->done();
if($table=='posts'){
     //eger postu siliremse onun etiketlerini de sil
     $db->delete('post_tags')
        ->where('tag_post_id',$id)
        ->done(); 

   //eger postu siliremse onun yorumlarini da sil
     $db->delete('comments')
        ->where('comment_post_id',$id)
        ->done(); 
 }
 if($table=='tags'){
      //eger tagi siliremse onu oldugu yerlerdende silirem
      $db->delete('post_tags')
         ->where('tag_id',$id)
         ->done(); 
 }
header("location:".$_SERVER['HTTP_REFERER']);
exit;
?>