<?php
/*
* Vysheslavov E.Y. (07_11_PHP) [v-e-y@outlook.com]
* Home work from 12.01
* Task: Сделайте две страницы: index.php и hello.php. 
* При заходе на index.php спросите с помощью формы имя пользователя, запишите его в сессию. 
* При заходе на hello.php поприветствуйте пользователя фразой "Привет, %Имя%!".
* Создать сайт из четырех страниц. На четвертой странице пользователь видит список страниц, которые он посещал.
*/

return [
    'minLength' => 3,
    'env' => 'dev',
    'routs' => [
        '/' => './view/index.php',
        '404' => './view/404.php',
        'hello' => './view/hello.php',
        'push' => './view/push.php',
        'bonus' => './view/bonus.php',
    ]
];