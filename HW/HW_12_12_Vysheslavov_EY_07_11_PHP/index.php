<?php declare(strict_types=1);
/*
* Vysheslavov E.Y. (07_11_PHP) [v-e-y@outlook.com]
* Home work from 12.12
* Task: Написать скрипт для загрузки пользовательских файлов. При загрузке, в зависимости от типа файла – он на сервере должен помещаться в папку /doc, или /img..etc
* Должно быть ограничение на прием файлов – не более 2 мб.
* Ссылку на форму загрузки разместить на главной странице сайта.
* После добавления файлов, при заходе на главную, пользователь должен видеть галерею ранее загруженных картинок, и список загруженных документов (все, что не картинки).
* Код максимально писать функциями.
*/

// App configs
$config = require_once('./conf.php');
$errors = [];
// App functions
require_once('./functions.php');

// Show errors
if ($config['env'] === 'dev') {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
}


if (isset($_FILES['upload_file'])) {
    //echo '<pre>';
    //var_dump($_FILES['upload_file']);
    if (isNoEmptyFormFileField($_FILES['upload_file']) && letsUploadFile($_FILES['upload_file'], $config)) {
        //echo 'File was upload';
    } else {
        echo 'some error';
    }
}


$fileList = getFilesFromRoots($config['roots']);
/* echo '<pre>';
print_r($fileList); */

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HW</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="./public/css/main.css">
</head>
<body class="container">
    <header class="border border-dark border-top-0 border-right-0 border-left-0 mb-4 mt-4">
        <h1 class="h3 font-weight-light">Завантаження та відображення файлів</h1>
    </header>
    <aside class="card mb-4 mt-4">
        <div class="card-body">
            <form action="/index.php" method="post" role="form" enctype="multipart/form-data" class="form-inline">
                <div class="form-group mr-2">
                    <input type="hidden" name="MAX_FILE_SIZE" value="2097152" />
                    <input type="file" name="upload_file" id="upload_file"  accept=".png, .jpg, .jpeg, .csv, .pdf"  class="form-control">
                </div>
                <input type="submit" value="Send me" name="submit" class="btn btn-primary">
            </form>
        </div>
    </aside>
    <main>
        <h2 class="h4 font-weight-light">Gallery</h2>
        <?php if ($fileList): ?>
            <div class="card-columns">
                <?php foreach ($fileList as $file): ?>
                    <?php if (isFileIsImage($file)): ?>
                        <div class="card">
                            <img src="<?= $file; ?>" alt="" class="card-img">
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
            <div class="clearfix"><hr></div>
            <h2 class="h4 font-weight-light">Files list</h2>
            <ul class="list-unstyled">
            <?php foreach ($fileList as $file): ?>
                <?php if (!isFileIsImage($file)): ?>
                    <li><?= basename($file) ?></li>
                <?php endif; ?>
            <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </main>
    <footer>
        
    </footer>
</body>
</html>