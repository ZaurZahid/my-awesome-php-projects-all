<?php
if(post('submit')){
   if($data=form_control()){ 
        $query=$row=$db->from('users')
                       ->where('user_url',permalink($data['user_name'])) 
                       ->where('user_rank', 3 ,'!=')
                       ->first(); 
                   if(!$query){
                       $error="Girdiyiniz bilgiler duzgun deyil,kontrol edin.(ve ya siz kullanicisiz)";
                   }else{
                       //parol kontrolu yap
                            $password_verify=password_verify($data['user_password'],$query['user_password']);
                            if($password_verify){
                                $success="Basariyla giris yapdiniz,yonlendirilirsiniz....";
                                //sessionlari yarat 
                                USER::Login($query);
                                header('Refresh:0.1;url='.admin_url());
                            }else{
                                $error="Yazdiginiz sifre hatalidir";
                            }
                   }
   }else{
       $error="Lutfen,bilgilerini girin";
   }
}
require admin_view('login');

?>