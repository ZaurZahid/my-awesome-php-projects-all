<?php
if(!permission('contact','edit')){
    permission_page();
} 
$id=get('id');

    if(!$id){
        header("location:".admin_url('contact'));
        exit;
    }

$row=$db->from('contact')
    ->join('users','users.user_id=contact.contact_read_user','left')
    ->where('contact_id',$id)
    ->first(); 

    if(!$row){
        header("location:".admin_url('contact'));
        exit;
    }

if(post('submit')){
        if($data=form_control('contact_permissions')){
            $data['contact_url']=permalink($data['contact_name']);
            $data['contact_permissions']=json_encode($_POST['contact_permissions']);
            $query=$db->update('contact')
                      ->where('contact_id',$id)
                      ->set($data);
            if($query){
                header('location:'.admin_url('contact'));
            }else{
                $error="Bir sorun olustu.";
            }
        }else{
            $error="Eksik alanlar var ,kontrol edin.";
        }
}  
if($row['contact_read']==0){
     $db->update('contact')
        ->where('contact_id',$id)
        ->set([
            'contact_read'=> 1,
            'contact_read_date'=>date("Y-m-d H:i:s"),
            'contact_read_user'=>session('user_id') 
        ]); 
}
 
require admin_view('edit-contact');
?>