<?php
 require 'header.php';
/*  burada aciklari ola biler ama asagidaki guvenlidir
$db->query("INSERT INTO  dersler set
baslik='elifba dersi', 
icerik='nagillar',
onay=1
"); */

/*   $sorgu=$db->prepare("INSERT INTO  dersler  set
baslik=?, 
icerik=?,
onay=?
 ");
$ekle=$sorgu->execute([
    'elifba dersi','nagillar',1
]);  
if($ekle){
    echo "elave edildi";
}else{
   $hata=$sorgu->errorInfo();
   echo "MYSQL hatasi : ".$hata[2];
} */
//? qoyanda cox guvenli olur
        if(isset($_POST['submit'])){
            $baslik=isset($_POST['baslik']) ? $_POST['baslik'] : null;
            $icerik=isset($_POST['icerik']) ? $_POST['icerik'] : null;
            $onay=isset($_POST['onay']) ? $_POST['onay'] : 0; 
            $kategori_id=isset($_POST['kategori_id'])&&is_array($_POST['kategori_id']) ? implode(',',$_POST['kategori_id']) : null;
        }
        if(!$baslik){
            echo "baslik yoxdur"; 
        }elseif(!$icerik){
            echo "icerik yoxdur";
        }elseif(!$kategori_id){
            echo "kategori_id yoxdur";
        }else{
        //ekleme islemi

        $sorgu=$db->prepare("INSERT INTO dersler set
        baslik=?, 
        icerik=?,
        onay=?,
        kategori_id=?
        ");
        $ekle=$sorgu->execute([
            $baslik,$icerik,$onay,$kategori_id
        ]); 
        
        $sonId=$db->lastInsertId();
        echo $sonId;

        if($ekle){
            header('location:index.php?sayfa=oxu&id='.$sonId);
        }else{
        $hata=$sorgu->errorInfo();
        echo "MYSQL hatasi : ".$hata[2];
        } 

    }
?>
    <form action="" method="post">
            baslik:<br>
            <input  type="text" name="baslik" value="<?php echo isset($_POST['baslik']) ? $_POST['baslik'] : null;?>"  ><hr>
            icerik:<br>
            <textarea name="icerik" cols="30" rows="5"><?php echo isset($_POST['icerik']) ? $_POST['icerik'] : null;?></textarea><hr>
            onay:<br>
            <select name="onay">
                <option value="1">Onayli</option>
                <option value="0">Onayli deyil</option> 
            </select><br>

            <input  type="hidden" name="submit" value="1" ><hr>
         
            <select name="kategori_id[]" multiple size="4" >
                    <?php 
                        $kat=$db->prepare("SELECT * FROM kategoriler order by id");
                        $kat->execute();
                        while($cag=$kat->fetch(PDO::FETCH_ASSOC)){
                             ?>
                            <option value="<?php echo $cag['id']?>"><?php echo $cag['ad']?></option>
                    <?php  } ?>
             </select><hr>

            <button type="submit">Send</button>
           
    </form> 