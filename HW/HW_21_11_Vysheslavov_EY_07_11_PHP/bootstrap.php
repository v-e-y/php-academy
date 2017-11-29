<?php
/*
* PATH: /HW/HW_21_11_Vysheslavov_EY_07_11_PHP/
*/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('conf.php');

function bootstrap (array $projectFolders) {
    // require project data 
    foreach ($projectFolders['data'] as $dataFiles) {
        require_once('./data/' . $dataFiles);
    }
    /*
    foreach ($projectFolders as $projectFolderFiles) {
       
    }
    */
}

// Run/Bild app 
bootstrap($projectFolders);

?>