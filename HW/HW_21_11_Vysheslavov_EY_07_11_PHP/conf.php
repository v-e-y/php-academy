<?php
/*
* project proppertys and settings
*/

// Project environment "dev" - for developming and "pub" - for public
$environment = 'dev';


// Project file structure
$projectFolders = [
    'components' => [
        'header' => [
            'templates' => [
                'index.php'
            ],
            'component.php'
        ],
        'main' => [
            'templates' => [
                'index.php'
            ],
            'component.php'
        ],
        'footer' => [
            'templates' => [
                'index.php'
            ],
            'component.php'
        ],
    ],
    'data' => [
        'menu.php'
    ],
    'conf.php'
];