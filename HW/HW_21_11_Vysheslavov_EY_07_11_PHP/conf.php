<?php
/*
* PATH: /HW/HW_21_11_Vysheslavov_EY_07_11_PHP/
* project proppertys and settings
*/
echo '_conf file_';

// Project environment "dev" - for developming and "pub" - for public
$env = 'dev';

// TODO delete this.
// echo $env;

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


//print_r(array_reverse($projectFolders));