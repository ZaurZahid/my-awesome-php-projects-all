<?php

function post($name){
    if(isset($_POST[$name])){
            if(is_array($_POST[$name])){
                 return array_map(function($item){
                    return htmlspecialchars(trim($item));
                },$_POST[$name]); 
            } 
      return htmlspecialchars(trim($_POST[$name]));
    }
}

function get($name){
    if(isset($_GET[$name])){
            if(is_array($_GET[$name])){
                return array_map(function($item){
                return htmlspecialchars(trim($item));
            },$_GET[$name]); 
          }
            

        return htmlspecialchars(trim($_GET[$name]));
    }
}

function form_control(...$except_these){ //bir func-da 2 den cox eleman almaq ucun
    unset($_POST['submit']);//ve FORM_CONTROL(neçe zorunlu olmayan sey varsa bura yaz)
    $data=[];
    $error=false;
        foreach($_POST as $key=>$value){
            if(!in_array($key,$except_these) && !post($key)){//eger keyler=>gonderilende olmazsa   VE post(edilmis keyde olmazsa) onda error ele 
                $error=true;//gonderilen ad eger emailde(yazmasada olar) olmazsa ve post(ad) olmazsa    //tutaqki 1ci kosul duzdu ikinci sehv kecir else hissesine
                            //form_control()   yeni ki,gonderilen ad,email ve s. bosluq da olmazsa(ici bos olanda) ve post edilmemisze error
            }else{
                $data[$key] = post($key);
            }
        }
        if($error){
            return false;
        }
    return $data;//bu funksiyani harda isledirik?
    //tutaqki eger user_name yoxdusa bunu ele,elseif bunu ele,else bunu ele temasinda qurtarmaq ucun
}
?>