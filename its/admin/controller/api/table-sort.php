<?php 
$tableName=post('table');
$whereColumnName=post('where');
$columnName=post('column');
//tam dinamik bir ajax ile update
foreach(post('id') as $index=>$id){
    $query=$db->update($tableName)
              ->where($whereColumnName,$id)
              ->set([
                $columnName=>$index
              ]); 
}
$json['success']="Siralama islemi oldu";
?>