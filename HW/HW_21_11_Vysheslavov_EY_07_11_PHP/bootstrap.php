<?php
/*
* PATH: /HW/HW_21_11_Vysheslavov_EY_07_11_PHP/
*/

// TODO del this
//require_once('./conf.php');
//require_once('./data/menu.php');


function bootstrap (array $projectFolders) {
    // require project data 
    foreach ($projectFolders['data'] as $dataFiles) {
        require_once('./data/' . $dataFiles);
    }

    // Build view
    // $viewFiles = array_reverse($projectFolders['components']); // App views
    foreach (array_reverse($projectFolders['components']) as $key => $value) {
       //var_dump('./components/' . $key . '/' . $value['templates'][0]);
       require_once('./components/' . $key . '/templates/' . $value['templates'][0]);
    }
    
}


// Run/Build app 
bootstrap($projectFolders);

?>