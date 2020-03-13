<?php
$meta=[
    'title'=>"Kayit ol"
];

if(post('submit')){
    $username=post('username');
    $email=post('email');
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
                'username'=>$username,
                'email'=>$email,
                'url'=>permalink($username),
                'pass'=>password_hash($password,PASSWORD_DEFAULT) 
            ]); 
            
            if($ekle){
                $success="Kayit isleminiz basariyla bas verdi ,yonlendirilirsiniz....";
                //sessionlari yarat
                USER::Login([
                    'user_id'=>$db->lastInsertId(),
                    'user_name'=>$username
                ]);


                header('Refresh:2;url='.site_url());
            }else{
                $error="Bir sorun olustu , lutfen bir daha deneyin";
            }
        }
 
    }
}
require view('kayit');


?>