<?php 

 


try {



	$db=new PDO("mysql:host=localhost;dbname=c2c2;charset=utf8",'root','63669902azza');

// "veritabanı bağlantısı başarılı";

}



catch (PDOExpception $e) {



	echo $e->getMessage();

}





 ?>