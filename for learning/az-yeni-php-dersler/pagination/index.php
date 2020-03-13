<?php
require_once "baglan.php";
//limit(sehifede nece dene veri olacaq)
$limit=10;

//sayfa (necenci sayfa)
//index.php?sayfa=2

$sayfa=isset($_GET['sayfa']) && is_numeric($_GET['sayfa']) ? $_GET['sayfa'] : 1;
  if($sayfa<=0){
      $sayfa=1;
  }
//toplam veri
$toplamVeri=$db->query('SELECT count(id) as $toplam from test2')->fetch(PDO::FETCH_ASSOC);
$toplamVeri=$toplamVeri['$toplam'];

//eger 61 olsa cavabi 61 bol 5-i 13 gosterir
$toplamSayfa=ceil($toplamVeri/$limit);
//veriler neceden baslayacaq
$baslangic=($sayfa*$limit)-$limit;


//verileri listele
$sorgu=$db->query("SELECT * FROM  test2  order by id desc limit " .$baslangic.",".$limit)->fetchAll(PDO::FETCH_ASSOC);

foreach($sorgu as $veri){
    echo $veri['ad']."<br>" ;
}

//sayfalari listele
$sol=$sayfa-3;
$sag=$sayfa+3;
    if($sayfa <= 4){
        $sag=7;
    }
    if($sag > $toplamSayfa){
        $sol=$toplamSayfa-6;
    }
echo '<div class="sayfalama">';
    echo '<a href="index.php?sayfa='.($sayfa > 1 ? $sayfa-1 : 1).'">Evvelki</a>';
        for($i=$sol; $i<=$sag; $i++){
            if($i>0 && $i<=$toplamSayfa){
                echo '<a '.($i==$sayfa ? ' class="active"' : null).' href="index.php?sayfa='.$i.'"> '.$i.' </a>';
            }
        } 
    echo '<a href="index.php?sayfa='.($sayfa<$toplamSayfa ? $sayfa+1 : $toplamSayfa).'">Sonraki</a>';
echo '</div>';
?>
    <style>
    .sayfalama a {
        display:inline-block;
        color:red;
        background:#eee;
        padding:10px;
        margin-right:5px;
    }
    .sayfalama a.active {
         
        color:white;
        background:green;
       
    }
    </style>