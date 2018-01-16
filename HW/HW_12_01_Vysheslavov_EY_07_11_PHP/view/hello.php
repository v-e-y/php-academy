<?php
/*
* Vysheslavov E.Y. (07_11_PHP) [v-e-y@outlook.com]
* Home work from 12.01
* Task: Сделайте две страницы: index.php и hello.php. 
* При заходе на index.php спросите с помощью формы имя пользователя, запишите его в сессию. 
* При заходе на hello.php поприветствуйте пользователя фразой "Привет, %Имя%!".
* Создать сайт из четырех страниц. На четвертой странице пользователь видит список страниц, которые он посещал.
*/

/* if (!isset($_SESSION['userName'])) {
    header("Location: http://{$_SERVER['HTTP_HOST']}/");
    exit;
} */
?>

<?php if (isset($_SESSION['userName'])) : ?>
<div class="col-12 col-md-8 col-lg-8">
    <div class="card bg-light border-0">
        <div class="card-body p-5">
            <p class="text-center lead">It is for you <strong><?= $_SESSION['userName'] ?></strong></p>
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/so9DBHCo64Q?rel=0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
<?php else: ?>
    <script>window.location.replace("/");</script>
<?php endif; ?>
