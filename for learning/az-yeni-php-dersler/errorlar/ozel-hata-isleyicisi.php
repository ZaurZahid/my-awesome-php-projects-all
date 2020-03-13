<?php
function ozelHataYakaliyici($no,$msg,$file,$line){/* ?>
   <div>
        <h3>Hata olustu.</h3>
        <p><?php echo $msg?></p>
   </div> 
<?php }  ?> */


 /* ================================================================ */


    //hatalri dosyaya yaz
   /*  $hataVerisi=$no. '|' . $msg. '|' .$file. '|' .$line. "\n";
    file_put_contents('hata.log',$hataVerisi,FILE_APPEND);//FILE_APPEND alt satira kec yaz
   */


    /* ================================================================ */
    $db=new PDO('mysql:host=localhost;dbname=hatalar','root','63669902azza');
    $sorgu=$db->prepare('INSERT INTO log set 
    message=?,file=?,no=?,line=? 
    ');
    $ekle=$sorgu->execute([
        $msg,$file,$no,$line
    ]); 
    

}

set_error_handler('ozelHataYakaliyici');

echo $test;
echo substr();
?>