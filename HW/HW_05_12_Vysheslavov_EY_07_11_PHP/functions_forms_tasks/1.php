<?php
/*
* Vysheslavov E.Y. (07_11_PHP) [v-e-y@outlook.com]
* Home work from 05.12
* Task: 1. Создать форму с двумя элементами textarea. При отправке формы скрипт должен выдавать только те слова, которые есть и в первом и во втором поле ввода.
*          Реализацию это логики необходимо поместить в функцию getCommonWords($a, $b), которая будет возвращать массив с общими словами.
*/

if (isset($_POST['textFielOne']) && isset($_POST['textFielTwo'])) {
   var_dump($_POST['textFielOne'], $_POST['textFielTwo']);
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
    <form action="/" method="post" role="form">
        <textarea name="textFielOne" id="textFielOne" cols="30" rows="10"></textarea>
        <br>
        <textarea name="textFieldTwo" id="textFieldTwo" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="Send me">
    </form>
</body>
</html>


<?php

function getCommonWords($a, $b) {
    
}

?>