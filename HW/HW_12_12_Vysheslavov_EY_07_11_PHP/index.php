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
    if (isNoEmptyFormFileField($_FILES['upload_file']) && letsUploadFile($_FILES['upload_file'], $config)) {
        $message = 'File was upload';
        echo $message;
    }
} else {
    var_dump($errors);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>HW</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>
<body class="container">
    <aside class="pt-5 pb-5">
        <form action="/index.php" method="post" role="form" enctype="multipart/form-data">
            <input type="hidden" name="MAX_FILE_SIZE" value="500000" />
            <input type="file" name="upload_file" id="upload_file"  accept=".png, .jpg, .jpeg, .csv, .pdf">
            <input type="submit" value="Send me" name="submit">
        </form>
    </aside>
    <main>
        <h1>Gallery</h1>
        <div>
            <div class="row">
                <?php foreach ($fileList as $value): ?>
                    <div class="card">
                        <img src="/gallery/<?= $value; ?>" alt="" class="img-fluid">
                    </div>
                <?php endforeach; ?>
            </div>            
        </div>
    </main>
    <footer>
        
    </footer>
</body>
</html>