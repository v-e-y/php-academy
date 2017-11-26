<?php
// Vysheslavov Euard, email: v-e-y@outlook.com
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$someArray = [
    'first'  => '1',
    'second' => '2',
    'third'  => '3',
    'nextArray' => [
        'first'  => '41',
        'second' => '42',
        'third'  => '43',
    ]
];

// echo $someArray.nextArray;
// array_map()
// sprintf('%s %s', ...$someArray);
// print_r(count($someArray));
// echo count($someArray, COUNT_RECURSIVE);
?>


