<?php
/*
* Vysheslavov E.Y. (07_11_PHP) [v-e-y@outlook.com]
* Home work from 05.12
* Task: 4. Написать функцию, которая выводит список файлов в заданной директории. Директория задается как параметр функции.
*/

// show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



/**
 * Get list of files in dir
 * @param string $dirName
 * @return array
 */
function fileListInDir(string $dirName):array {
    $listItemsInDir = array_diff(scandir($dirName), ['..', '.']);
    $fileList = [];
    foreach ($listItemsInDir as $value) {
        if (is_file($value)) {
            $fileList[] = $value;
        }
    }
    return $fileList;
}

print_r(fileListInDir('./'));

?>