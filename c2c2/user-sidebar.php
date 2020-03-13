<ul class="profile-title">
<li><a href="#Products" data-toggle="tab" aria-expanded="false"><i class="fa fa-briefcase" aria-hidden="true"></i>
Urunleri(<?php
$kullanici_id=$kullanicicek['kullanici_id'];
$urunsay=$db->prepare("SELECT COUNT(kategori_id) as say from urun where kullanici_id=:id");
$urunsay->execute(array(
'id'=> $kullanici_id
));

$saycek=$urunsay->fetch(PDO::FETCH_ASSOC);
echo $saycek['say'];
?>)</a></li>

</ul>