<?php
/*
* PATH: /HW/HW_21_11_Vysheslavov_EY_07_11_PHP/components/header/
*/

// Example data for menu
// TODO Change variable to return. variable for dev
return [
    [
        'id' => 0,
        'parentId' => false,
        'title' => 'First item',
        'name' => 'Aaa',
        'href' => '/#1',
        'child' => false
    ],
    [
        'id' => 1,
        'parentId' => false,
        'title' => 'Second item',
        'name' => 'Bbb',
        'href' => '/#2',
        'child' => false
    ],
    [
        'id' => 2,
        'parentId' => false,
        'title' => 'Third item',
        'name' => 'Ccc',
        'href' => '/#3',
        'child' => true,
        'childItems' => [
            [
                'id' => 3,
                'parentId' => 2,
                'title' => 'Some item',
                'name' => 'Caa',
                'href' => '/#4',
                'child' => false
            ],
            [
                'id' => 4,
                'parentId' => '2',   
                'title' => 'One more item',
                'name' => 'Cbb',
                'href' => '/#5',
                'child' => true,
                'childItems' => [
                    [
                    'id' => 5,
                    'parentId' => 4,
                    'title' => 'Some one more item',
                    'name' => 'Cbc',
                    'href' => '/#6',
                    'child' => false
                    ]
                ]
            ],
        ]
    ],
];

/*
function showMenuItems(array $menuArry)
{
    // print_r($menuArry);
    foreach ($menuArry as $menuArryItem) {
        // if array item haven`t child items
        if (!$menuArryItem['child']) {
            echo $menuArryItem['id']; 
        }
        // if array item have child items
        if ($menuArryItem['child']) {
            echo $menuArryItem['id'];
            showMenuItems($menuArryItem['childItems']);
        }
    }
}
*/
//showMenuItems($devArr);