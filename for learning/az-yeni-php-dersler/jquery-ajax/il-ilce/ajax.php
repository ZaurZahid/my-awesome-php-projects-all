<?php
  $db=new PDO('mysql:host=localhost;dbname=ajax','root','63669902azza');


    $vilayet_kodu=$_POST['vilayet_kodu'];
    if(isset($vilayet_kodu)){

        $sor=$db->prepare("SELECT * FROM seher where seher_no=? ");
        $sor->execute([
            $vilayet_kodu
        ]);
        $cek=$sor->fetchAll(PDO::FETCH_ASSOC);

        $html='<option>-Seher sec-</option>';
        foreach($cek as $seher){
            $html.='<option value="'.$seher['seher_id'].'"> '.$seher['seher_ad'].' </option>';
        }
        echo $html;
    }

 

?>