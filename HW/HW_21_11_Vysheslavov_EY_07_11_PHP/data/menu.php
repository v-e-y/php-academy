<?php
/*
* PATH: /HW/HW_21_11_Vysheslavov_EY_07_11_PHP/data/
*
*/


// TODO Change variable to return, variable for dev
$devArr = [
    [
        'id' => 0,
        'title' => 'First item',
        'href' => '/#1',
        'child' => false
    ],
    [
        'id' => 1,
        'title' => 'Second item',
        'href' => '/#2',
        'child' => false
    ],
    [
        'id' => 2,
        'title' => 'Third item',
        'href' => '/#3',
        'child' => true,
        'childItems' => [
            [
                'id' => 3,
                'title' => 'Some item',
                'href' => '/#4',
                'child' => false
            ],
            [
                'id' => 4,
                'title' => 'One more item',
                'href' => '/#5',
                'child' => false
            ],
        ]
    ],
];

foreach ($devArr as $item) {
    if ($item['child'] != false) {
        print_r($item);
    }
}