<?php

class Question{  

public static function Sual(){

    global $db;
    return $sorgu=$db->from('question')
                     ->orderby('question_sira','asc')
                     ->limit(0,5)
                     ->all(); 
    }

}


?>