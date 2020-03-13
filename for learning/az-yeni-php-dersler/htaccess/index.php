<a href="">ANASAYFA</a>
<a href="iletisim">ILETISIM</a>
<a href="hakkimda">HAKKIMDA</a>

<?php
 
if(!isset($_GET['sayfa'])){
     $_GET['sayfa']='index';
} 
switch ($_GET['sayfa']) {
    case 'index':
        require_once 'anasayfa.php'; 
        break;
    case 'iletisim':
        require_once 'iletisim.php'; 
        break;
    case 'hakkimda':
        require_once 'hakkimda.php'; 
        break;
    case 'konu':
    require_once 'konu.php'; 
    break;
 
}

?>