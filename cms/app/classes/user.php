<?php

class USER{
//sessionlari logine hem de kayit sehifesinde promoy yaratmaq ucun
   public static function Login($data){
        $_SESSION['user_id']=$data['user_id'];
        $_SESSION['user_name']=$data['user_name']; 
        $_SESSION['user_email']=$data['user_email'];  
        $_SESSION['user_rank']=$data['user_rank']; 
        $_SESSION['user_permissions']=$data['user_permissions']; 
    }
//bele bir istifadecinin olub olmadigni yoxlamaq ucun 
    public static function UserExists($username,$email="@@"){ //@@ yeni olmayan bir sey ($email gondermeyende ancaq $usernameni gondermek isteyende)
        global $db;
        //bele bir adam evvel kayit olubmu ya yox , bunu kontrol et
        $query=$db->prepare("SELECT * FROM users where  user_name=:username || user_email=:email");
        $query->execute([
            'username'=>$username,
            'email'=>$email
        ]); 
       return $query->fetch(PDO::FETCH_ASSOC);
    }

//kullanici kayit islemi
public static function Register($data){

    global $db;
    $sorgu=$db->prepare("INSERT INTO users set
    user_name=:username, 
    user_email=:email,
    user_url=:url,
    user_password=:pass 
    ");
    return $sorgu->execute($data); 

}

}


?>