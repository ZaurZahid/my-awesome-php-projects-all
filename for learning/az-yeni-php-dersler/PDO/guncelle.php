<?php
require 'header.php';
if(!isset($_GET['id']) || empty($_GET['id'])){
     header("location:index.php");
     exit;
}
 
$sor=$db->prepare("SELECT * FROM dersler where id=?");
$sor->execute([
    $_GET['id']
]);
$cek=$sor->fetch(PDO::FETCH_ASSOC);
if(!$cek){
    header("location:index.php");
    exit;
}  

    $dersKategorileri=explode(",",$cek['kategori_id']);

if(isset($_POST['submit'])){
    $baslik=isset($_POST['baslik']) ? $_POST['baslik'] : $cek['baslik'];
    $icerik=isset($_POST['icerik']) ? $_POST['icerik'] : $cek['icerik'];
    $onay=isset($_POST['onay']) ? $_POST['onay'] : 0;  
    $kategori_id=isset($_POST['kategori_id'])&&is_array($_POST['kategori_id']) ? implode(',',$_POST['kategori_id']) : null;
}
if(!$baslik){
    echo "baslik yoxdur"; 
}elseif(!$icerik){
    echo "icerik yoxdur";
}elseif(!$kategori_id){
    echo "kategori yoxdur";
}else{
//guncelleme islemi


$sorgu=$db->prepare("UPDATE  dersler SET
baslik=?, 
icerik=?,
onay=?,
kategori_id=?
 where id=? ");
$guncelle=$sorgu->execute([
    $baslik,$icerik,$onay,$kategori_id,$_GET['id']
]); 
if($guncelle){
    header("location:index.php?sayfa=oxu&id=".$_GET['id']);
    exit;
}  

}  
?>
 <form action="" method="post">
            baslik:<br>
            <input  type="text" name="baslik" value="<?php echo $cek['baslik']?>"><hr>
            icerik:<br>
            <textarea name="icerik" cols="30" rows="5"><?php echo $cek['icerik']?></textarea><hr>
            onay:<br>
            <select name="onay">
        
        <option <?php echo $cek['onay']==1 ? 'selected':'';?>  value="1">Onayli</option>
        <option <?php echo $cek['onay']==0 ? 'selected':'';?> value="0">Onayli deyil</option>  
        
            </select><br>

            <input  type="hidden" name="submit" value="1" ><hr>
<!-- ===================================================== -->

<select name="kategori_id[]" multiple size="4" >
                    <?php 
                            //$cek_kateid=$cek['kategori_id'];
                     
                        $kat=$db->prepare("SELECT * FROM kategoriler order by id");
                        $kat->execute();
                        while($kategoricek=$kat->fetch(PDO::FETCH_ASSOC)){
                            $kategori_idi=$kategoricek['id'];
                               ?>
                            <option <?php echo in_array($kategori_idi,$dersKategorileri) ? "selected" : ''  ?> value="<?php echo $kategoricek['id']?>"><?php echo $kategoricek['ad']?></option>
                    <?php  } ?>
             </select><hr>
 
            <button type="submit">Send</button>
           
 </form> 