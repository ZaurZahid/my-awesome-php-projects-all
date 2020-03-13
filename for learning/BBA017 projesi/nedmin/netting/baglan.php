<?php 

 


try {



	$db=new PDO("mysql:host=localhost;dbname=bba017;charset=utf8",'root','63669902azza');

 //echo "veritabanı bağlantısı başarılı";

}



catch (PDOExpception $e) {



	echo $e->getMessage();

}





 ?>