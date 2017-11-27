<?php

echo 'test';

?>

- построить меню
- * построить рекурсивную функцию которая будет строить меню. -> Рекурсивное меню.
- почитать про кучу стек, списки, и понимать структуры данных.
- создать конфигуратор файл


*рекурсивная итерация


<!DOCUMENT html>
<html>
    <head>
        <title>Array menu</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php require_once (__DIR__ . '/components/header/component.php')?>
    </body>
</html>

---------------------------------------------------------------------------------
<?php

$menu = [
    [
        'title' => 'Home',
        'href' => 'index.html'
    ],[
        'title' => 'Shop',
        'href' => 'index.html'
    ],[
        'title' => 'Blog',
        'href' => 'index.html'
    ],[
        'title' => 'New collection',
        'href' => 'index.html'
    ],[
        'title' => 'Hottest items',
        'href' => 'index.html',
        'items' => [
            [
                'title' => 'Home',
                'href' => 'index.html'
            ],[
                'title' => 'Shop',
                'href' => 'index.html'
            ],[
                'title' => 'Blog',
                'href' => 'index.html'
            ],[
                'title' => 'New collection',
                'href' => 'index.html'
            ],[
                'title' => 'Login',
                'href' => 'index.html'
            ]
        ]
    ]
];

require_once (__DIR__ . '/templates/navbar.php');
---------------------------------------------------------------------------------
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php foreach ($menu as $item): ?>
                <?php if(!isset($item['items'])): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= $item['href'] ?>"><?= $item['title'] ?></a>
                    </li>
                <?php else: ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $item['title'] ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($item['items'] as $subitem): ?>
                                <a class="dropdown-item" href="<?= $subitem['href'] ?>">
                                    <?= $subitem['title'] ?>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>