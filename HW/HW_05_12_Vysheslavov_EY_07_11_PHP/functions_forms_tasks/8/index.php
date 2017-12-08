<?php
/*
* Vysheslavov E.Y. (07_11_PHP) [v-e-y@outlook.com]
* Home work from 05.12
* Task: 7. Создать гостевую книгу, где любой человек может оставить комментарий в текстовом поле и добавить его. Все добавленные комментарии выводятся над текстовым полем.
*/

// show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['user_comment']) && isset($_POST['submit'])) {
    $userComment = strip_tags($_POST['user_comment']);
    // file for write and store comment
    $commentsFile = './comments.json';

    writeCommentToFile($userComment, $commentsFile);
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

$listOfAllComments = getComments('./comments.json');
/* echo '<pre>';
print_r($listOfAllComments);
die; */

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
    <?php foreach ($listOfAllComments as $comment): ?>
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