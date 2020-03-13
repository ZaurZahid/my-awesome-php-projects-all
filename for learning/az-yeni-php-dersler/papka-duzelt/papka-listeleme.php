<?php 

function papkaListele($val){

    $dosyalar=scandir($val);
 //print_r($dosyalar);
    echo "<ul>";
    foreach($dosyalar as $dosya){
      if(!in_array($dosya,['.','..'])){
        echo "<li>"
        .$dosya;
        if(is_dir ($val."/".$dosya) ){
          papkaListele($val."/".$dosya);
        }
        echo"</li>";
      }
    }
 
    echo "</ul>";
}
  papkaListele(".");

//bunu glob() ile de etmek olar 49cu video

?>