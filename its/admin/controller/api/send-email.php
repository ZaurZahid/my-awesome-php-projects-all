<?php 
if($data=form_control()){
    $send=send_email($data['email'],$data['name'],$data['movzu'],nl2br($data['message']));
    if($send){
        $json['success']="Emeliyyat ugurla bas verdi,mesaj gonderildi....";
    }else{
        $json['error']="Emeliyyat alinmadi,mesaji tezeden gonderin....";
    }
     
}else{
    $json['error']="Lutfen butun bilgileri doldurun";
}
 
?>