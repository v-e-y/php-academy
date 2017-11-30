<?php
/*
* PATH: /HW/HW_21_11_Vysheslavov_EY_07_11_PHP/components/header/templates/
*/

$menuArry = require_once('../component.php');
// $menuArry = require_once($_SERVER['DOCUMENT_ROOT'] . '/components/header' . '/component.php');
?>

<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <?php foreach ($menuArry as $menuArryItem): ?>
                <?php if (!$menuArryItem['child']): ?>
                    <li class="nav-item"><a class="nav-link" id="<?= $menuArryItem['id'] ?>" href="<?= $menuArryItem['href'] ?>" title="<?= $menuArryItem['title'] ?>"><?= $menuArryItem['name'] ?></a></li>
                <?php endif; ?>
                <?php if ($menuArryItem['child']): ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="<?= $menuArryItem['href'] ?>" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $menuArryItem['name'] ?></a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <?php foreach ($menuArryItem['childItems'] as $menuArryItem): ?>
                                <a class="dropdown-item" id="<?= $menuArryItem['id'] ?>" title="<?= $menuArryItem['title'] ?>" href="<?= $menuArryItem['href'] ?>" ><?= $menuArryItem['name'] ?></a>
                            <?php endforeach; ?>
                        </div>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
</nav>
</header>