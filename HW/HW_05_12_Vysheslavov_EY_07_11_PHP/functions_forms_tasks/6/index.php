<?php
/*
* Vysheslavov E.Y. (07_11_PHP) [v-e-y@outlook.com]
* Home work from 05.12
* Task: 6. Создать страницу, на которой можно загрузить несколько фотографий в галерею. Все загруженные фото должны помещаться в папку gallery и выводиться на странице в виде таблицы.
*/

// show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_FILES['file_image']) && isset($_POST['submit'])) {
    // root to folder gor image
    $folderForImage = './gallery/';
    $fileToUpload = $folderForImage . basename($_FILES["file_image"]["name"]);
    $downloadStatus = true;
    $errorMesage = [];

    //var_dump($fileToUpload);

    //  check file size
   if ($_FILES["file_image"]["size"] > 500000) {
        $errorMesage[] = 'Sorry fil is to big';
        $downloadStatus = false;
   }

   // check file exist
   if (file_exists($fileToUpload)) {
        $errorMesage[] = "Sorry, file already exists.";
        $downloadStatus = false;
    }

    // save file
    if(move_uploaded_file($_FILES["file_image"]["tmp_name"], $fileToUpload)) {
        echo 'file saved';
    } elseif (!$downloadStatus){
        var_dump($errorMesage);
    }

}

/**
 * Get list of files in dir
 * @param string $dirName
 * @return array
 */
function fileListInDir(string $dirName):array {
    $listItemsInDir = array_diff(scandir($dirName), ['..', '.']);
    $fileList = [];
    foreach ($listItemsInDir as $value) {
        if (is_file($dirName . '/' . $value)) {
            $fileList[] = $value;
        }
    }
    return $fileList;
}

// get image list
$fileList = fileListInDir('./gallery');


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
            <input type="file" name="file_image" id="file_image"  accept=".png, .jpg, .jpeg">
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