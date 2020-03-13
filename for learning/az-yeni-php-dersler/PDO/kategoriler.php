<?php
 require 'header.php';
if(isset($_POST['kategori'])){
    
    $sorgu=$db->prepare("INSERT INTO kategoriler set
    ad=? 
    ");
    $ekle=$sorgu->execute([
        $_POST['kategori']
    ]);  
    if($ekle){
        header('location:index.php');
    }else{
    $hata=$sorgu->errorInfo();
    echo "MYSQL hatasi : ".$hata[2];
    } 

}

?>
 <form action="" method="post">
            kategori Adi:<br>
            <input  type="text" name="kategori"><hr>
            <button type="submit">Send</button>
 </form> 
 <div>
 <h4>Yuklenen kategoriler</h4>
    <ol>
    <?php
    $sorgu=$db->prepare("SELECT kategoriler.*,count(dersler.id) as  toplamDers FROM kategoriler 
    left join dersler on Find_in_set(kategoriler.id,dersler.kategori_id) 
    group by kategoriler.id
    ");
    $sorgu->execute();
    while($islet=$sorgu->fetch(PDO::FETCH_ASSOC)){?>
         <a href="index.php?sayfa=kategori&id=<?php echo $islet['id']?>"><?php echo $islet['ad']?>(<?php echo $islet['toplamDers']?>)</a><hr>
    <?php  }  ?>
     
    </ol>
 </div>