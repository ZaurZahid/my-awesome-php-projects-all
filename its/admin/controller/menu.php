<?php
if(!permission('menu','show')){
    permission_page();
} 
$query=$db->from('menu') 
           ->orderby('menu_id','desc')
           ->all();
require admin_view('menu');

?>