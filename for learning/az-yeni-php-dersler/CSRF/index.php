<?php
require 'db.php';

$id=1;

$sor=$db->prepare("SELECT * FROM uyeler where id=?");
$sor->execute([
    $id
]);
$cek=$sor->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="form.php" method="post">
    Hakkinda: <hr>
    <textarea name="hakkinda" id="" cols="30" rows="10"><?php echo $cek['hakkinda']?></textarea><hr>
    <input type="hidden" name="token" value=<?php echo $_SESSION['token'];?>>
    <button type="submit">Gonder</button>
    </form>
</body>
</html>