<?php
if(!route(1)){
    $route[1]='index';
}
if(!file_exists(admin_controller(route(1)))){
    $route[1]='index';
} 
if(!session('user_name')){
    $route[1]='login';
}
$menus=[
    'index'=>[
        'title'=>'Anasayfa',
        'icon'=>'dashboard',
        'permissions'=>[
            'show'=>'Goruntuleme'
        ]
    ], 
    'users'=>[
        'title'=>'Uyeler',
        'icon'=>'person',
        'permissions'=>[
            'show'=>'Goruntuleme',
            'edit'=>'Duzenleme',
            'delete'=>'Silme'
        ]/* ,
        'submenu'=>[
            'add_user'=>'Uye ekle',
            'user'=>'Uyeleri listele' 
        ] */
    ],
    'contact'=>[
        'title'=>'Iletisim mesajlari',
        'icon'=>'message',
        'permissions'=>[
            'show'=>'Goruntuleme',
            'edit'=>'Duzenleme',
            'send'=>'Cavapla',
            'delete'=>'Silme'
        ]
    ], 
     
    'posts'=>[
        'title'=>'Movzular',
        'icon'=>'list',
        'permissions'=>[
            'show'=>'Goruntuleme',
            'add'=>'Ekleme',
            'edit'=>'Duzenleme', 
            'delete'=>'Silme'
        ]
    ],  
    'menu'=>[
        'title'=>'Menu Yonetimi',
        'icon'=>'list',
        'permissions'=>[
            'show'=>'Goruntuleme',
            'edit'=>'Duzenleme',
            'add'=>'Ekleme',
            'delete'=>'Silme'
        ]
    ],
    'pages'=>[
        'title'=>'Sehifeler',
        'icon'=>'folder',
        'permissions'=>[
            'show'=>'Goruntuleme',
            'edit'=>'Duzenleme',
            'add'=>'Ekleme',
            'delete'=>'Silme'
        ]
    ],
     'question'=>[
        'title'=>'Suallar',
        'icon'=>'extension',
        'permissions'=>[
            'show'=>'Goruntuleme',
            'edit'=>'Duzenleme',
            'add'=>'Ekleme',
            'delete'=>'Silme'
        ]
    ],
    'settings'=>[
        'title'=>'Ayarlar',
        'icon'=>'settings_applications',
        'permissions'=>[
            'show'=>'Goruntuleme',
            'edit'=>'Duzenleme' 
        ]
        ],
    'partners'=>[
        'title'=>'Partners',
        'icon'=>'person_add',
        'permissions'=>[
            'show'=>'Goruntuleme', 
            'add'=>'Ekleme',
            'delete'=>'Silme'
        ]
        ] 
];


require admin_controller(route(1));

?>