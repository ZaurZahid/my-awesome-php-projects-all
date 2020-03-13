<?php require "baglan.php"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="app.js"></script>
    <style>
    #basarili{
        background:green;
        padding:10px;
        display:none;
        color:white;
    }
    #basarisiz{
        background:red;
        padding:10px;
        display:none;
        color:white;
    }
    </style>
</head>
<body>
<div id="basarili"></div><div id="basarisiz"></div>
    <form action="" method="post" id="iletisim-form" onsubmit="return false;"><!-- hec yana gondermemek ucun -->
    Ad:<br>
    <input type="text" id="ad" name="ad" ><br>
    Email <br>
    <input type="text" id="email" name="email" ><br>
    Textarea <br>
    <textarea name="mesaj" id="mesaj" cols="30" rows="10"></textarea>

    <button type="submit" id="gonder-btn">Gonder</button>
</form>
</body>
</html>