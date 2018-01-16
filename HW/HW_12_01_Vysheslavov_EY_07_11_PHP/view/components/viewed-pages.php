<?php
/*
* Vysheslavov E.Y. (07_11_PHP) [v-e-y@outlook.com]
* Home work from 12.01
* Task: Сделайте две страницы: index.php и hello.php. 
* При заходе на index.php спросите с помощью формы имя пользователя, запишите его в сессию. 
* При заходе на hello.php поприветствуйте пользователя фразой "Привет, %Имя%!".
* Создать сайт из четырех страниц. На четвертой странице пользователь видит список страниц, которые он посещал.
*/
?>

<!-- viewed pages -->
<ul class="list-inline justify-content-center">
    <?php foreach ($_SESSION['pages'] as $page): ?>
        <li class="list-inline-item"><?= ucfirst($page) ?></li>
    <?php endforeach ?>
</ul>