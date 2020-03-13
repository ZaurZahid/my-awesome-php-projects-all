<?php 
    $meta=[
        'title'=>"Sehifeler"
    ]; 
   
// pagination example
$totalRecord = $db->from('pages')
                  ->select('count(page_id) as total') 
                  ->total();
$pageLimit = 2;
$pageParam = 'sayfa';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);
$query = $db->from('pages') 
            ->orderby('page_id', 'DESC')
            ->limit($pagination['start'], $pagination['limit'])
            ->all(); 
  
require view('pages'); 
?>