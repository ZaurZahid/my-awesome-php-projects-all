<?php
session_start();
    try {
         $db=new PDO('mysql:host=localhost;dbname=test','root','63669902azza');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }


    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(!isset($_POST['token']) || $_POST['token']!=$_SESSION['token'] ){
            die("Gecersiz CSRF dosyasi HACK EDE BILMEDINIZ:))))");
        }
    }

    //if islemi hemise sessiondan yuxarida olmalidi eger asagida olsa 
    //her defe yeni token yaratdigina gore zibili cixir


    //INDEX.PHP DE select islemini edende onsuzda tokeni yaradir ve insert edende
    //hazir elinde olur ve eger = deyilse ve ya post yoxdusa exit eliyir 
    //b.html de token olmadigina gore exit olur
 
    $_SESSION['token']=uniqid();


?>