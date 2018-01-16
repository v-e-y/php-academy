<?php declare(strict_types=1);
/*
* Vysheslavov E.Y. (07_11_PHP) [v-e-y@outlook.com]
* Home work from 12.01
* Task: Сделайте две страницы: index.php и hello.php. 
* При заходе на index.php спросите с помощью формы имя пользователя, запишите его в сессию. 
* При заходе на hello.php поприветствуйте пользователя фразой "Привет, %Имя%!".
* Создать сайт из четырех страниц. На четвертой странице пользователь видит список страниц, которые он посещал.
*/
// TODO Я не зрозумів це два окремих завдання або одне...

// TODO Всі сторінки окрім головної (/) йдуть з кодом 404, поки не можу зрозуміти чому. Буду копатися ще але якщо допоможете буду вдячний.

session_start();

// App configs
$config = require_once('./config.php');
// App functions
require_once('./functions.php');
// Show errors
if ($config['env'] === 'dev') {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}

collectViewedPages($_SERVER['REQUEST_URI'], $config['routs']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home work from 12.01</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
</head>
<body>
    <header class="text-center pt-5 pb-5">
        <h1 class="display-1">Hi there</h1>
        <?php require_once('./view/components/menu.php'); ?>
    </header>
    <main class="container pt-5 pb-5">
        <div class="row  justify-content-center">
            <?php if (isset($_SESSION['error'])):  ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['error'];  ?>
                </div>
            <?php endif; ?>
            <?php routing($_SERVER['REQUEST_URI'], $config['routs']) ?>
        </div>
    </main>
    <footer class="text-center pt-5">
        <?php require_once('./view/components/viewed-pages.php'); ?>
        <p>Vysheslavov E.Y. (07_11_PHP) Home work from 12.01</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>