<?php
/*
* Vysheslavov E.Y. (07_11_PHP) [v-e-y@outlook.com]
* Home work from 05.12
* Task: 11. Написать функцию, которая в качестве аргумента принимает строку, и форматирует ее таким образом, что каждое новое предложение начиняется с большой буквы.
*/

// show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function getUpperFirstLeterAtString(string $string) {
    $string = explode('. ', $string);
    /* $string = array_map(function(string $str) {
        return ucfirst($str);
    }, $string); */
    $string = array_map("toUpperCaseMB", $string);
    return implode('.', $string);
}

function toUpperCaseMB(string $s) {
    return mb_convert_case($s, MB_CASE_TITLE, 'UTF-8');
}