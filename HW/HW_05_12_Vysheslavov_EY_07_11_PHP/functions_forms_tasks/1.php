<?php
/*
* Vysheslavov E.Y. (07_11_PHP) [v-e-y@outlook.com]
* Home work from 05.12
* Task: 1. Создать форму с двумя элементами textarea. При отправке формы скрипт должен выдавать только те слова, которые есть и в первом и во втором поле ввода.
*          Реализацию это логики необходимо поместить в функцию getCommonWords($a, $b), которая будет возвращать массив с общими словами.
*/

// show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['textFielOne']) && isset($_POST['textFielTwo'])) {
   print_r(getCommonWords($_POST['textFielOne'], $_POST['textFielTwo']));
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
    <form action="/1.php" method="post" role="form">
        <textarea name="textFielOne" id="textFielOne" cols="30" rows="10"></textarea><br>
        <textarea name="textFieldTwo" id="textFieldTwo" cols="30" rows="10"></textarea><br>
        <input type="submit" value="Send me">
    </form>
</body>
</html>


<?php
/**
 * Take two strings from textarea field, compare words and return identical
 * @param string $a
 * @param string $b
 * @return array
 */
function getCommonWords(string $a = NULL, string $b = NULL):array {
    if ($a && $b) {
        // make array from string and trim each element
        $c = array_map(function($a) {
            return trim($a);
        }, explode(' ', $a));

        // make array from string and trim each element
        $d = array_map(function($b) {
            return trim($b);
        }, explode(' ', $b));

        // compare words in arrays
        return array_intersect($c, $d);
    } else {
        return var_dump('some error at vars', $a, $b);
    }
}

?>