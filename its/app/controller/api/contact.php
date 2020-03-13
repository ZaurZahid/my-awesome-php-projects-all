<?php

if($data=form_control('phone')){
    if(!filter_var($data['email'],FILTER_VALIDATE_EMAIL)){
        $json['error']="Emailiniz uygun gelmedi ,tezeden gonderin.";
     }else{
         
    $query=$db->insert('contact')
              ->set([
                  'contact_name'=>$data['name'],
                  'contact_email'=>$data['email'],
                  'contact_phone'=>$data['phone'],
                  'contact_movzu'=>$data['movzu'],
                  'contact_mezmun'=>$data['mezmun']
              ]);
              if($query){
                  $json['success']="Mesajiniz gonderildi tesekkurler";
              }else{
                $json['error']="Ne ise bas verdi ,tezeden gonderin.";
              }
         }

}
else{
    $json['error']="Butun alanlari doldurman lazim";
}

?>