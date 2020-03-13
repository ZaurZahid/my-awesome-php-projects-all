<?php
if(!permission('menu','show')){
    permission_page();
} 
$query=$db->prepare("SELECT*FROM menu order by menu_id desc");
$query->execute();
$rows=$query->fetchAll(PDO::FETCH_ASSOC); 

require admin_view('menu');
?>