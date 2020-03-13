<?php
if(isset($_POST['submit'])){
    print_r($_POST);
}
?>

<form action="" method="post">
Ad:<br>
<input type="text" name="ad" ><br>
Soyad:<br>
<input type="text" name="soyad" ><br>
Meslek <br>
<select name="meslek">
    <option value="webdeveloper">Web Developer</option>
    <option value="biznesmen">Biznesmen</option>
</select>
<button type="submit" name="submit" value="1">Gonder</button>
</form>