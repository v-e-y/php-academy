<?php
// Алексей Руснак zeo alians


if (isset($_POST['one']) && isset($_POST['two'])) {
    print_r(implode(' ', getCommonWord(explode(' ', $_POST['one']), explode(' ', $_POST['two']))));
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
    <form action="/lessons/05_12/index.php" method="post" role="form">
        <div><textarea type="text" id="exampleInputTextOne" placeholder="text input 1" name="one"></textarea></div>
        <div><textarea type="text" id="exampleInputTextTwo" placeholder="text input 2" name="two"></textarea></div>
        <input type="submit" class="btn btn-primary" value="send">
    </form>
</body>
</html>
<?php


/**
 * Function for 
 *
 * @param array $arrayOne
 * @param array $arrayTwo
 * @return array
 */
function getCommonWord(array $arrayOne, array $arrayTwo):array {
 return array_intersect($arrayOne, $arrayTwo);
}


?>
