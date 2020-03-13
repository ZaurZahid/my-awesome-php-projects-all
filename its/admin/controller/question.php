<?php
 
   if(!permission('question','show')){
    permission_page();
} 
 
// pagination example
$totalRecord = $db->from('question')
                  ->select('count(question_id) as total')
                  ->total();
$pageLimit = 5;
$pageParam = 'page';
$pagination = $db->pagination($totalRecord, $pageLimit, $pageParam);
$query = $db->from('question')
            ->orderby('question_sira', 'asc')
            ->limit($pagination['start'], $pagination['limit'])
            ->all();
    
require admin_view('question');

?>