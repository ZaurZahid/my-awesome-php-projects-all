<!--  hedef iste buradir  
 -->
BURANI ANCAQ UYE OLANLAR GORECEK

<?php
if(isset($_POST['hakkinda'])){
    print_r($_POST);
}

?>
<form action="" method="post">


    <textarea name="hakkinda" placeholder="hakkinda ......."cols="30" rows="10"></textarea>
    <button type="submit">Gonder</button>


</form>