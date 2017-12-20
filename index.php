<?php

$roots = [
    'image' =>  './uploads/image/',
    'application' => './uploads/doc/'
];


function getFilesFromRoots(array $roots):array {
    $files = [];
    foreach ($roots as $root) {
        $files[] = $root;
    }
    return $files;
}


print_r(getFilesFromRoots($roots));

?>


