<?php

    try {
         $db=new PDO('mysql:host=localhost;dbname=ajax','root','63669902azza');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

?>