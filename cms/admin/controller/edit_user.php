<?php
if(!permission('users','edit')){
    permission_page();
} 
$id=get('id');

    if(!$id){
        header("location:".admin_url('users'));
        exit;
    }

$row=$db->from('users')
    ->where('user_id',$id)
    ->first(); 

    if(!$row){
        header("location:".admin_url('users'));
        exit;
    }

if(post('submit')){
        if($data=form_control('user_permissions')){
            $data['user_url']=permalink($data['user_name']);
            $data['user_permissions']=json_encode($_POST['user_permissions']);
            $query=$db->update('users')
                      ->where('user_id',$id)
                      ->set($data);
            if($query){
                header('location:'.admin_url('users'));
            }else{
                $error="Bir sorun olustu.";
            }
        }else{
            $error="Eksik alanlar var ,kontrol edin.";
        }
}  
$permissions=json_decode($row['user_permissions'],true); 
require admin_view('edit-user');
?>