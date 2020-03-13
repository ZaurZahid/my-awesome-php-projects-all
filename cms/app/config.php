<?php
//root deqiq hardadi yolunu gosterir _DIR_ kimi
//4 sabit deyisken
define('PATH',realpath('.')); 
define('SUBFOLDER',true);
define('URL','http://localhost/cms');
define('SUBFOLDER_NAME','cms');
//icinde DB olan arrayi qaytar
return [
    'db'=>[
        'name'=>'cms',
        'host'=>'localhost',
        'user'=>'root',
        'pass'=>'63669902azza',
    ]
]

?>