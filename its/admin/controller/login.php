<?php
if(post('submit')==1){
   if($data=form_control()){ 
        $query=$row=$db->from('users')
                       ->where('user_url',permalink($data['user_name']))  
                       ->where('user_rank',3 ,"!=")
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
                                header('Refresh:1;url='.admin_url());
                            }else{
                                $error="Yazdiginiz sifre hatalidir";
                            }
                   }
   }else{
       $error="Lutfen,bilgilerini girin";
   }
}
 
if(post('submit2')==2){
    $username=post('user_name2');
    $email=post('user_email');
    $password=post('password');
    $password_again=post('password_again');
    
    if(!$username){
        $error="lutfen kullanici adiniz yazin";
    }elseif(!$email){
        $error="lutfen emailinizi yazin";
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error="lutfen gecerli bir email yazin";
    }elseif(!$password || !$password_again){
        $error="lutfen passwordunuzu yazin";
    }elseif($password!==$password_again){
        $error="Parollariniz uygun gelmir";
    }else{
        //bele bir adam evvel kayit olubmu ya yox , bunu kontrol et

        $row=USER::UserExists($username,$email); 

        if($row){
            $error="Bu kullanici adi ve ya email evvel istifade edilib ,lutfen yeni birsey yazin.";
        }else{
            //kayit islemi (INSERT)
            $ekle=USER::Register([
                'user_name'=>$username,
                'user_email'=>$email,
                'user_url'=>permalink($username),
                'user_password'=>password_hash($password,PASSWORD_DEFAULT) 
            ]); 
            
            if($ekle){
                $success="Kayit isleminiz basariyla bas verdi ,yonlendirilirsiniz....";
                //sessionlari yarat
                USER::Login([
                    'user_id'=>$db->lastInsertId(),
                    'user_name'=>$username
                ]);


                header('Refresh:2;url='.admin_url());
            }else{
                $error="Bir sorun olustu , lutfen bir daha deneyin";
            }
        }
 
    }
}
 
require admin_view('login');

?>