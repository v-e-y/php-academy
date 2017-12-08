<?php
/*
* Vysheslavov E.Y. (07_11_PHP) [v-e-y@outlook.com]
* Home work from 05.12
* Task: 10. Написать функцию, которая считает количество уникальных слов в тексте. Слова разделяются пробелами. Текст должен вводиться с формы.
*/

// show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['user_text']) && isset($_POST['submit'])) {
    echo getCountUniqueWords($_POST['user_text']);
}

/**
 * Count of unique words in user text 
 * @param string $userText
 * @return int
 */
function getCountUniqueWords(string $userText):int {
    $userText = explode(' ', $userText);
    return count(array_count_values($userText));
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="/" method="post">
        <textarea name="user_text" id="user_text" cols="30" rows="10" require></textarea>
        <input type="submit" value="Send message" name="submit">
    </form>
</body>
</html>