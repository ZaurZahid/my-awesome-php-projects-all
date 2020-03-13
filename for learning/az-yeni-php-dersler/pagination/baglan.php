<?php

    try {
         $db=new PDO('mysql:host=localhost;dbname=php','root','63669902azza');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

?>