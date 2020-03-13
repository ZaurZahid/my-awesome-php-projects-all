<?php
if(!permission('partners','show')){
  permission_page();
} 
 $sonuc=[];
if(post('submit')){
  if(!permission('partners','add')){
    $sonuc['hata']="Sizin buna yetkiniz yox";
    }else{
      $yuklenilen=yukle($_FILES['partner_img']);
      if(isset($yuklenilen['hata'])){
          $sonuc['hata']=$yuklenilen['hata'];
      }else{ 
  
          $query2=$db->from('partners') 
                    ->where('partners_img',$yuklenilen['deyer']) 
                    ->first();
            if($query2){
              $sonuc['hata']="bu sekil evvel yuklenib";
            }else{ 
              $query=$db->insert('partners') 
                      ->set([
                          'partners_img'=>$yuklenilen['deyer']
                      ]);
              if($query){
                  $sonuc['success']=$yuklenilen['deyer'] ." yuklendi"; 
                  }  
              } 
            }        
  
      }
    } 
  
  json_encode($sonuc);  

$query3=$db->from('partners') 
           ->orderby('partners_id','asc')
           ->all();

require admin_view('partners');

?>