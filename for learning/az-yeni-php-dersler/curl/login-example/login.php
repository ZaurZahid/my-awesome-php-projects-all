<?php 
    if(isset($_POST['submit'])){
        if(empty($_POST['ad']) || empty($_POST['sifre'])){
            echo "kullanci adi ve ya sifresi bosdur.";
        }elseif($_POST['ad']=="admin"  &&  $_POST['sifre']=="admin"){
            
            //oturumu ac
            $_SESSION['login']=true;
            header("location:index.php");


        }else{
            echo "kullanci adi ve ya sifresi HATALI.";
        }
    }
?>


<form action="" method="post">
Ad:<br>
<input type="text" name="ad" ><br>
Password:<br>
<input type="text" name="sifre" ><br>
 
<button type="submit" name="submit" value="1">Giris Yap</button>
</form>