<?php
/*
* Vysheslavov E.Y. (07_11_PHP) [v-e-y@outlook.com]
* Home work from 05.12
* Task: 9. Написать функцию, которая переворачивает строку. Было "abcde", должна выдать "edcba". Ввод текста реализовать с помощью формы.
*/

// show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['user_text']) && isset($_POST['submit'])) {
    echo stringReverse($_POST['user_text']);
}

/**
 * Reverse user string
 * @param string $userText
 * @return string
 */
function stringReverse(string $userText):string {
    return strrev(strip_tags($userText));
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
    <?php if ($isCommentBlock): ?>
        <h3>Некорректный комментарий</h3>
    <?php endif; ?>
    <?php foreach (getComments('./comments.json') as $comment): ?>
        <hr>
        <p><?= $comment; ?></p>
    <?php endforeach ?>
    <hr>
    <form action="/" method="post">
        <textarea name="user_text" id="user_text" cols="30" rows="10" require></textarea>
        <input type="submit" value="Send message" name="submit">
    </form>
</body>
</html>