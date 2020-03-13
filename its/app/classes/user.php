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
        return  $query=$db->from('users')
                    /* ->where('user_name',$username) ve ya olmalidir */
                          ->where('user_email',$email)
                          ->first(); 
    }

//kullanici kayit islemi
public static function Register($data){

    global $db;
    return $sorgu=$db->insert('users')
                     ->set($data);  
}

}


?>