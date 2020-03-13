<?php
// bu en cox admin panellerde istifade olunur
require_once "baglan.php";
//limit(sehifede nece dene veri olacaq)
$limit=10;
//index.php?sayfa=2
$baslangic=isset($_GET['baslangic']) && is_numeric($_GET['baslangic']) && $_GET['baslangic']>0 ? $_GET['baslangic'] : 0;
//verileri listele
$sorgu=$db->query("SELECT * FROM  test2  order by id desc limit " .$baslangic.",".$limit)->fetchAll(PDO::FETCH_ASSOC);

foreach($sorgu as $veri){
    echo $veri['ad'].'<br>';
}
//eger 100 dene verimizde 105-e getsek ?baslangic=105 onda
// 105-10 edir
if(!$sorgu){
    header('location:index2.php?baslangic='. ($baslangic-$limit) .'&son=1');
}
 
if($baslangic >= 10){
    echo  '<a href="index2.php?baslangic=' . ($baslangic-$limit) . '">onceki sayfa</a>';
}

//eger son=1 varsa day "sonraki sayfa" seyini gosterme adi qalsin
if(!isset($_GET['son'])){
    echo '<a href="index2.php?baslangic=' . ($baslangic+$limit) . '">sonraki sayfa</a>';
}
?>
