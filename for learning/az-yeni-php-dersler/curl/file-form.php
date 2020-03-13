<?php
if(isset($_FILES['dosya']['name'])){
   if($_FILES['dosya']['type']=='image/jpeg'){
        move_uploaded_file($_FILES['dosya']['tmp_name'],'upload/'.$_FILES['dosya']['name']);
   }else{
       die("gecersiz dosya formati");
   }
} 
?>

<form action="" method="post" enctype="multipart/form-data">
Ad:<br>
<input type="text" name="ad" ><br> 
Sekil <br>
<input type="file" name="dosya" ><br>
<button type="submit">Gonder</button>
</form>