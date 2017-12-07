<?php
/*
* Vysheslavov E.Y. (07_11_PHP) [v-e-y@outlook.com]
* Home work from 05.12
* Task: 3. Есть текстовый файл. Необходимо удалить из него все слова, длина которых превыщает N символов. Значение N задавать через форму. Проверить работу на кириллических строках - найти ошибку, найти решение.
*/

// show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['wordsLength'])) {
   print_r(delWordsWithSomeLength($_POST['wordsLength']));
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HW</title>
</head>
<body>
    <form action="/index.php" method="post" role="form">
        <input type="number" name="wordsLength" id="wordsLength" min="1" max="99" autofocus require>
        <input type="submit" value="Send me">
    </form>
</body>
</html>


<?php

/**
 * Filter and delete words wich length more then user sad
 * @param string $wordsLength
 * @return string
 */
function delWordsWithSomeLength(string $wordsLength = NULL):string {
    if ($wordsLength) {
        // get data (array) from file
        $text = getDataFromFile('./text.json');
        // filter data (words)
        $resultText = array_filter($text, function($s) use ($wordsLength){
            return strlen($s) <= $wordsLength;
        });

        return implode(' ', $resultText);
    }
}


/**
 * Get data from json file
 * @param string $fileNameRoot
 * @return array
 */
function getDataFromFile(string $fileNameRoot = null): array {
    $dataAtFile = file_get_contents($fileNameRoot) ?? false;
    if ($dataAtFile) {
        $dataAtFile = json_decode($dataAtFile, true);

        return explode(' ', $dataAtFile['text']);
    }
}

?>