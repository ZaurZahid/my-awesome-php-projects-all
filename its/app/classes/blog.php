<?php 
class BLOG{
public static function find_post_by_url($posturl){
    global $db;
    $query=$db->from('posts')
              ->where('post_url',$posturl)
              ->where('post_status',1)
              ->first();
    return $query;
}
}
?>