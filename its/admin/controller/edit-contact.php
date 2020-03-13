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
->where('contact_id',$id)
->first(); 

if(!$row){
    header("location:".admin_url('contact'));
    exit;
}
if($row['contact_read']==0){
    $query=$db->update('contact')
              ->where('contact_id',$id)
              ->set([
                'contact_read'=>1,
                'contact_read_date'=>date('Y-m-d H:i:s')
              ]);
}
/* if(post('submit')){
    if($data=form_control('user_phone')){ 
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
}  */ 
 require admin_view('edit-contact');
?>