<?php
$meta=[
    'title'=>"Giris ele"
];

if(post('submit')){
    $username=post('username'); 
    $password=post('password'); 
    
    if(!$username){
        $error="lutfen kullanici adiniz yazin";
    }elseif(!$password){
        $error="lutfen sifrenizi yazin";
    }else{
        //bele bir adam evvel kayit olubmu ya yox , bunu kontrol et
        $answer=USER::UserExists($username);
       
        if($answer){
            //parol kontrolu yap
            $password_verify=password_verify($password,$answer['user_password']);
            if($password_verify){
                $success="Basariyla giris yapdiniz,yonlendirilirsiniz....";
                //sessionlari yarat
                USER::Login($answer);
                header('Refresh:2;url='.site_url());
            }else{
                $error="Yazdiginiz sifre hatalidir";
            }

         }else{
            $error="|Bele bir Istifadeci kayit olmamisdir|";
        } 
 
    }
}
require view('login');


?>