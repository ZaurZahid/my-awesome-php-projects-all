

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="app.js"></script>
</head>
<body>
    VILAYETI SECIN:<br>
    <select name="vilayet" id="vilayet">
    <option value="">--Vilayet secin--</option>
    <?php 
    $db=new PDO('mysql:host=localhost;dbname=ajax','root','63669902azza');
    $sor=$db->prepare("SELECT * FROM vilayet ");
    $sor->execute();
    
   while($cek=$sor->fetch(PDO::FETCH_ASSOC)){?>
       <option value="<?php echo $cek['vil_nomresi']?>"><?php echo $cek['vil_ad']?></option>
  <?php }   ?> 
       
  </select>
<hr>

    Rayonu SECIN:<br>
    <select name="seher" id="seher" disabled>

    <option > -Seher sec- </option>

    </select>
</body>
</html>