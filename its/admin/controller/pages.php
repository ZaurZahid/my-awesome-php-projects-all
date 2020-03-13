<?php
 
 if(!permission('pages','show')){
    permission_page();
} 
 
// pagination example
$totalRecord = $db->from('pages')
                  ->select('count(page_id) as total')
                  ->total();
$pageLimit = 5;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);
$query = $db->from('pages')
            ->orderby('page_id', 'DESC')
            ->limit($pagination['start'], $pagination['limit'])
            ->all();
  
require admin_view('pages');

?>