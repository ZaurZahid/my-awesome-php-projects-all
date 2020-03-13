<?php
if(!route(1)){
    $route[1]='index';
}

if(!file_exists(admin_controller(route(1)))){
    $route[1]='index';
} 
if(!session('user_rank') || session('user_rank')==3){
    $route[1]='login';
}

$menus=[
    'index'=>[
        'title'=>'Anasayfa',
        'icon'=>'tachometer',
        'permissions'=>[
            'show'=>'Goruntuleme'
        ]
    ], 
    'users'=>[
        'title'=>'Uyeler',
        'icon'=>'user',
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
        'icon'=>'envelope',
        'permissions'=>[
            'show'=>'Goruntuleme',
            'edit'=>'Duzenleme',
            'send'=>'Cavapla',
            'delete'=>'Silme'
        ]
    ],
    'tags'=>[
        'title'=>'Etiketler',
        'icon'=>'tag',
        'permissions'=>[
            'show'=>'Goruntuleme',
            'add'=>'Ekleme',
            'edit'=>'Duzenleme', 
            'delete'=>'Silme'
        ]
    ],
    'posts'=>[
        'title'=>'Movzular',
        'icon'=>'file-o',
        'permissions'=>[
            'show'=>'Goruntuleme',
            'add'=>'Ekleme',
            'edit'=>'Duzenleme', 
            'delete'=>'Silme'
        ]
    ],
    'comments'=>[
        'title'=>'Yorumlar',
        'icon'=>'comments',
        'permissions'=>[
            'show'=>'Goruntuleme', 
            'edit'=>'Duzenleme', 
            'delete'=>'Silme'
        ]
    ],
    'categories'=>[
        'title'=>'Kategoriler',
        'icon'=>'folder',
        'permissions'=>[
            'show'=>'Goruntuleme',
            'add'=>'Ekleme',
            'edit'=>'Duzenleme', 
            'delete'=>'Silme'
        ]
    ],
    'pages'=>[
        'title'=>'Sehifeler',
        'icon'=>'file',
        'permissions'=>[
            'show'=>'Goruntuleme',
            'add'=>'Ekleme',
            'edit'=>'Duzenleme', 
            'delete'=>'Silme'
        ]
    ],
    'menu'=>[
        'title'=>'Menu Yonetimi',
        'icon'=>'bars',
        'permissions'=>[
            'show'=>'Goruntuleme',
            'edit'=>'Duzenleme',
            'add'=>'Ekleme',
            'delete'=>'Silme'
        ]
    ],
    'settings'=>[
        'title'=>'Ayarlar',
        'icon'=>'cog',
        'permissions'=>[
            'show'=>'Goruntuleme',
            'edit'=>'Duzenleme' 
        ]
    ]
    ];

require admin_controller(route(1));


?>