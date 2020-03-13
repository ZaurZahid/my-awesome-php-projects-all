 <?php 
 require 'baglan.php';
 $sor=$db->prepare("SELECT * FROM `data` order by id desc limit 0,5 ");
 $sor->execute();
 $cek=$sor->fetchAll(PDO::FETCH_ASSOC);

 ?>
 
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
     <ul id="list">
       <?php foreach($cek as $veri){
             
                require 'yorum.php'; 
        
         } ?>
     </ul>
     <button id="btn">Daha coxunu goster</button>
 </body>
 </html>