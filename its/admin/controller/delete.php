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
 
if($table=='partners'){ 
 $resimsilunlink=get('img');
 $yol= PATH.'/app/public/img/img/'. $resimsilunlink;
 unlink($yol);
}          
header("location:".$_SERVER['HTTP_REFERER']);
exit;
?>