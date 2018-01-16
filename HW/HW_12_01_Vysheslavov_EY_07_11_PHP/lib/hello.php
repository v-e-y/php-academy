<?php declare(strict_types=1);
/*
* Vysheslavov E.Y. (07_11_PHP) [v-e-y@outlook.com]
* Home work from 12.01
* Task: Сделайте две страницы: index.php и hello.php. 
* При заходе на index.php спросите с помощью формы имя пользователя, запишите его в сессию. 
* При заходе на hello.php поприветствуйте пользователя фразой "Привет, %Имя%!".
* Создать сайт из четырех страниц. На четвертой странице пользователь видит список страниц, которые он посещал.
*/
session_start();
require_once('../functions.php');
$appConf = require_once('../config.php');

if (isset($_POST['userName'])) {
    // Check post values
    if (checkFieldValue($_POST['userName'], $appConf)) {
        // Write value to session;
        $_SESSION['userName'] = $_POST['userName'];
        // If user have error make earlier we will remove it. (wrote to many:) ). Remove error if have
        if (isset($_SESSION['error'])) {
            unset($_SESSION['error']);
        }
        // Redirect to page where we will say named hello to user.
        header("Location: http://{$_SERVER['HTTP_HOST']}/hello");
        exit;
    } 
    // If make mistake in value write error text to session and redirect to index.php
    $_SESSION['error'] = 'Something wrong with Name which you wrote.<br>Probably it to short, should be more then 3 character.';
    header("Location: http://{$_SERVER['HTTP_HOST']}/");
    exit;
}
