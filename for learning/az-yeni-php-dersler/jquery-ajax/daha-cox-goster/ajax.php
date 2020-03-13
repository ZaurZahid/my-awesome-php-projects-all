<?php
 require 'baglan.php';

$id=$_POST['id'];
$sor=$db->prepare("SELECT * FROM `data` where ? > id order by id desc limit 0,5 ");
$sor->execute([
     $id
]);
$cek=$sor->fetchAll(PDO::FETCH_ASSOC);

$html='';
foreach($cek as $veri){
    ob_start(); 
         require 'yorum.php';
    $html.=ob_get_clean(); //buna demesemki basla baslamayacaq ona gore deyiseken atiram

}
   echo json_encode([
     'html' => $html,
     'gizle'=>count($cek) < 5 ? true : false
     ]);   
     
  /*    echo $html; */
?>