<?php
 require 'header.php';
if(!isset($_GET['id']) || empty($_GET['id'])){
    header("location:index.php");
    exit;
}
    $sorgu=$db->prepare("SELECT * FROM kategoriler where id=?");
    $sorgu->execute([
        $_GET['id']
    ]);
    $islet=$sorgu->fetch(PDO::FETCH_ASSOC);
    if(!$islet){
        header('location:index.php');
    }else{
    $ders=$db->prepare("SELECT * FROM dersler where find_in_set(?,kategori_id)  order by id desc");
    $ders->execute([
        $islet['id']
    ]);
    $dersler=$ders->fetchAll(PDO::FETCH_ASSOC);
} 
?>
<?php if($dersler):?>
<div>
<h2><?php echo $islet['ad']?> Kategorisi</h2>
   <ul>
   <?php foreach($dersler as $x):?>
            <li><?php echo $x['baslik'] ?></li>
                <?php if($x['onay']==1):?>
                    <a href="?sayfa=oxu&id=<?php echo $x['id']?>">OXU</a>
                <?php endif;?>
            <a href="?sayfa=guncelle&id=<?php echo $x['id']?>">DUZENLE</a>
            <a href="?sayfa=sil&id=<?php echo $x['id']?>">SIL</a>
            <hr> 
   <?php endforeach?>
   </ul>
</div>
<?php else:?>
   <strong style="color:red"> Bu kategoriye ait hele ders elave edilmeyib</strong>
<?php endif;?>