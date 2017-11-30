<?php
/*
* PATH: /HW/HW_21_11_Vysheslavov_EY_07_11_PHP/
*/

// TODO del this
//require_once('./conf.php');
//require_once('./data/menu.php');


function bootstrap (array $projectFolders) {
    // require project data 
    /*
    foreach ($projectFolders['data'] as $dataFiles) {
        require_once('./data/' . $dataFiles);
    }
    */

    // Build view
    // $viewFiles = array_reverse($projectFolders['components']); // App views
    foreach ($projectFolders['components'] as $key => $value) {
       require_once('./components/' . $key . '/templates/' . $value['templates'][0]);
    }
    
}

// Run/Build app 
bootstrap($projectFolders);

?>