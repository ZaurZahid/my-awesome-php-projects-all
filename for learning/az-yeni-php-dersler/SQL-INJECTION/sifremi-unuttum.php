<?php

//XARICDEN DEYERI GOTURENDE FILTERLEMEMIS KECIRTSEY BELE SEYLER ORTAYA CIXIR
/* $id="' '; DROP TABLE uyeler;";

$sql='SELECT * FROM uyeler where id= '.$id;
echo $sql;
 */

$db=new PDO('mysql:host=localhost;dbname=test','root','63669902azza');

if(isset($_POST['email'])){
    $email=$_POST['email'];
    /* $sql='SELECT * FROM uyeler where email="'.$email.'" ';
    echo $sql; */
     $sorgu=$db->prepare("SELECT * FROM uyeler where email=?");
     $sorgu->execute([$email]);
// "; DROP TABLE test; //axtarisa bunu yazsam esseyim oldu)test tablosunu silir
   /*   *///
    if($sorgu->rowCount()){
        $uye=$sorgu->fetch(PDO::FETCH_ASSOC);
        print_r($uye);
    }
}

?>

<form action="" method="post">
Email adresi:
<input type="text" name="email"><br>
<button type="submit">Gonder</button>

</form>