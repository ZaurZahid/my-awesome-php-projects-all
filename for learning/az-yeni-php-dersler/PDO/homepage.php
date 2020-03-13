
<?php require 'header.php';
/*  
$sorgu=$db->prepare("SELECT * FROM dersler where id=?");
$sorgu->execute([
    3
]);

$islet=$sorgu->fetchAll(PDO::FETCH_ASSOC);

print_r($islet); */
$where=[];
$sql='SELECT dersler.id,dersler.baslik,dersler.onay,GROUP_CONCAT(kategoriler.ad) as kategori_ad,GROUP_CONCAT(kategoriler.id) as kategori_ids  FROM `dersler` inner join kategoriler on find_in_set(kategoriler.id,kategori_id)';
    if(isset($_GET['arama'])&& !empty($_GET['arama'])){
    $where[]='(dersler.baslik  LIKE "%'.$_GET['arama'].'%"||dersler.icerik LIKE "%'.$_GET['arama'].'%")';
    }
    if(isset($_GET['baslangic']) && !empty($_GET['baslangic']) || isset($_GET['bitis']) && !empty($_GET['bitis'])){
    $where[]='dersler.tarih BETWEEN "' .$_GET['baslangic']. ' 00:00:00" AND "' .$_GET['bitis']. ' 23:59:59"';
    }
    if(count($where)>0){
        $sql.=" WHERE ".implode(' && ',$where);
    }
 
$sql.='GROUP BY dersler.id ORDER BY dersler.id DESC';
$sorgu=$db->prepare($sql);
$sorgu->execute();
$islet=$sorgu->fetchAll(PDO::FETCH_ASSOC);
  
?>
    <h3>Dersler listesi</h3>
    <form action="" method="get">
        <input type="text" name="arama" value="<?php echo isset($_GET['arama'])?$_GET['arama']:''?>" placeholder="derslerde axtar...."><br>
        <input type="text" class="tarix" name="baslangic" value="<?php echo isset($_GET['baslangic'])?$_GET['baslangic']:''?>" placeholder="Baslangic tarix"><br>
        <input type="text" class="tarix" name="bitis" value="<?php echo isset($_GET['bitis'])?$_GET['bitis']:''?>" placeholder="Bitis tarix"><br>
        <button type="submit">Axtar</button>
    </form>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
        $(".tarix").datepicker({
            dateFormat:'yy-mm-dd'
        });
    } );
   </script>

    <?php if($islet):?> 
    <ul>
            <?php foreach($islet as $ex):?> 
                <li><?php echo $ex['baslik'] ?>( <?php 

                $kategoriAdlari=explode(',', $ex['kategori_ad']);
                $kategoriIdlari=explode(',', $ex['kategori_ids']);
 
                foreach($kategoriAdlari as $key=>$val){
                  echo '<a href="index.php?sayfa=kategori&id='. $kategoriIdlari[$key] .'">'.$val.'</a> ';
                }
                ?> 
                )
                </li> 
                    <?php if($ex['onay']==1):?>
                        <a href="?sayfa=oxu&id=<?php echo $ex['id']?>">OXU</a>
                    <?php endif;?>
                <a href="?sayfa=guncelle&id=<?php echo $ex['id']?>">DUZENLE</a>
                <a href="?sayfa=sil&id=<?php echo $ex['id']?>">SIL</a>
                <hr> 
            <?php endforeach;?>
    </ul>
    <?php else:?>
        <div>
            <?php if(isset($_GET['arama'])):?>
                Axtardiginiz tapilmadi.
            <?php else :?>
                HELE DERS ELAVE EDILMEYIB 
            <?php endif;?>
        </div>
        <?php endif?>
    