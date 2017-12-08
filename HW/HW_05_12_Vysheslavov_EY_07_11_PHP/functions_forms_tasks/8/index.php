<?php
/*
* Vysheslavov E.Y. (07_11_PHP) [v-e-y@outlook.com]
* Home work from 05.12
* Task: 8. Создать гостевую книгу, где любой человек может оставить комментарий в текстовом поле и добавить его. Все добавленные комментарии выводятся над текстовым полем. 
Реализовать проверку на наличие в тексте запрещенных слов, матов. При наличии таких слов - выводить сообщение "Некорректный комментарий". Реализовать удаление из комментария всех тегов, кроме тега &lt;b&gt;.
*/

// show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['user_comment']) && isset($_POST['submit'])) {
    // file for write and store comment
    $commentsFile = './comments.json';
    $userComment = checkComment($_POST['user_comment']);
    if ($userComment) {
        writeCommentToFile($userComment, $commentsFile);
    } else {
        // user comment with block words
        $isCommentBlock = true;
    }
}


/**
 * Write user comment to json file
 * @param array $userComment
 * @param string $commentsFile
 * @return void
 */
function writeCommentToFile(string $userComment, string $commentsFile):void {
    // get all comments for add and save new comment
    $allComments = getComments($commentsFile);
    // add new comment to old
    $allComments[] = $userComment;
    // format array to json
    $userCommentsJson = json_encode($allComments, JSON_PRETTY_PRINT);
    if (file_put_contents($commentsFile, $userCommentsJson)) {
        echo 'comment was saved';
    }
}

function checkComment(string $userComment) {
    // words to block (remove frpm text)
    $blockWords = ['сука', 'сукин', 'суки'];
    // clean comment
    $userComment = strip_tags($userComment, '&lt;b&gt;');
    // Make array from userComment type string
    $userComment = explode(' ', $userComment);
    // filter comment
    // $filteredComment = array_diff($userComment, $blockWords);

    // should be more lith/simply method
    foreach ($userComment as $word) {
        if (in_array(trim(strtolower($word)), $blockWords)) {
            return false;
        }
    }
    return implode(' ', $userComment);
}

/**
 * Get comments from file
 * @param string $fileName
 * @return array
 */
function getComments(string $fileName):array {
    $commentsData = file_get_contents($fileName);
    if ($commentsData) {
        $commentsData = json_decode($commentsData, true);
        return $commentsData;
    }
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
        <textarea name="user_comment" id="user_comment" cols="30" rows="10" require></textarea>
        <input type="submit" value="Send message" name="submit">
    </form>
</body>
</html>