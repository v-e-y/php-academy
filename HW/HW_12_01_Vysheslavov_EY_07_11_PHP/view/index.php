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


<div class="col-12 col-md-8 col-lg-6">
    <div class="card bg-light border-0">
        <div class="card-body p-5">
            <form class="form-inline" action="./lib/hello.php" method="post">
                <fieldset>
                    <div class="form-row align-items-center">
                        <legend class="col-12 text-center">Write your name here</legend>
                        <div class="col-3">
                            <label for="userName">Your name:</label>
                        </div>
                        <div class="col-6">
                            <input type="text" id="userName" name="userName" class="form-control ml-2 mr-2" aria-describedby="userName" autofocus required>
                        </div>
                        <div class="col-3">
                            <button type="submit" class="btn btn-outline-secondary btn-block">Send</button>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>