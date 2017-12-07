<?php
/*
* Vysheslavov E.Y. (07_11_PHP) [v-e-y@outlook.com]
* Home work from 05.12
* Task: 2. Создать форму с элементом textarea. При отправке формы скрипт должен выдавать ТОП3 длинных слов в тексте. Реализовать с помощью функции.
*/

// show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['textFiel'])) {
   print_r(getThreeLongestWords($_POST['textFiel']));
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Two forms with textarea</title>
</head>
<body>
    <form action="/2.php" method="post" role="form">
        <textarea name="textFiel" id="textFiel" cols="30" rows="10"></textarea><br>
        <input type="submit" value="Send me">
    </form>
</body>
</html>


<?php

/**
 * Get string from user and returl 3 longest words.
 * @param string $a
 * @return array
 */
function getThreeLongestWords(string $a = NULL):array {
    // make array from string
    $a = explode(' ', $a);
    // sort array
    array_multisort(array_map('strlen', $a), $a);
    // return array with 3 longest words
    return array_slice(array_reverse($a), 0, 3);
}

?>