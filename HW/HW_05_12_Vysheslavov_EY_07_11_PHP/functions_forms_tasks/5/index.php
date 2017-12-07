<?php
/*
* Vysheslavov E.Y. (07_11_PHP) [v-e-y@outlook.com]
* Home work from 05.12
* Task: 5. Написать функцию, которая выводит список файлов в заданной директории, которые содержат искомое слово.  Директория и искомое слово задаются как параметры функции.
*/

// show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


/**
 * Get files from dir vish contains needed words/string
 * @param string $dirName
 * @param string $searchWord
 * @return array
 */
function fileListInDirWithNeededString(string $dirName, string $searchWord):array {
    $listItemsInDir = array_diff(scandir($dirName), ['..', '.']);
    $fileList = [];
    foreach ($listItemsInDir as $value) {
        if (is_file($value) && strpos($value, $searchWord) !== false) {
            $fileList[] = $value;
        }
    }
    return $fileList;
}

print_r(fileListInDirWithNeededString('./', 'ind'));

?>