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


/**
 * Something like errors log. 
 * @param string $errorMessage
 * @param array $errors
 * @return array
 */
function uploadErrors(string $errorMessage, array &$errors):array {
    return $errors += $errorMessage;
}

/**
 * Undocumented function
 * @param array $field
 * @return bool
 */
function isNoEmptyFormFileField(array $field):bool {
    if ($field && is_array($field)) {
        return true;
    } 
    return false;
}

/**
 * Get file name
 * @param string $fileName
 * @return string
 */
function getFileName(string $uploadfileName):string {
    return basename($uploadfileName);
}

// TODO Hmmm, maby trash
function getTmpFileName(string $tmpFileName):string {
    return $tmpFileName;
}

/**
 * Return file type
 * @param string $uploadFileType
 * @return string 
 */
function getFileType(string $uploadFileType):string {
    return stristr($uploadFileType, '/', true);
}

/**
 * Return file extension
 * @param string $uploadFileName
 * @return string 
 */
function getFileExtension(string $uploadFileName):string {
    return pathinfo($uploadFileName, PATHINFO_EXTENSION);
}

/**
 * Check upload file type for allowed in App
 * @param string $uploadFileType
 * @param array $allowedTypes
 * @return bool
 */
function isAllowedFileType(string $uploadFileType, array $allowedTypes):bool {
    if (in_array($uploadFileType, $allowedTypes)) {
        return true;
    } 
    return false;
}

/**
 * Check upload file extension for allowed in App
 * @param string $uploadFileExtension
 * @param array $allowedExtension
 * @return bool
 */
function isAllowedFileExtension(string $uploadFileExtension, array $allowedExtension):bool {
    if (in_array($uploadFileExtension, $allowedExtension)) {
        return true;
    }
    return false;
}

/**
 * Check file upload size
 * @param int $fileSize
 * @param int $fileMaxSize
 * @return bool
 */
function isFileSizeLess2mb(int $fileSize, int $fileMaxSize):bool {
    return $fileSize <= $fileMaxSize;   
}

/**
 * Check is file exist
 * @param string $fileType
 * @param array $rootsForUpload
 * @return bool
 */
function isFileExist(string $fileNameForUpload):bool {
    return file_exists($fileNameForUpload);
}

/**
 * Return root to dir for upload 
 * @param string $fileType
 * @param array $rootsForUpload
 * @return string
 */
function getDirRootForUpload(string $fileType, array $rootsForUpload):string {
    return $rootsForUpload[$fileType];
}

/**
 * Make/bild file name for upload
 * @param string $dirRootForUpload
 * @param string $fileName
 * @return string
 */
function getFileNameForUpload(string $dirRootForUpload, string $fileName):string {
    return $dirRootForUpload . $fileName;
}


/**
 * Check and upload file.
 * @param array $fileForUpload
 * @param array $uploadPropertis
 * @return bool
 */
// TODO що краще, кожного разу викликати функції чи зробити змінні (fileName, fileType, nameForUpload e.t.c.) і потім працювати зі змінними?
function letsUploadFile(array $fileForUpload, array $uploadPropertis):bool {
    $fileName = getFileName($fileForUpload{'name'});
    $tmpFileName = getTmpFileName($fileForUpload['tmp_name']);
    $fileType = getFileType($fileForUpload['type']);
    $fileExtension = getFileExtension($fileName);
    $fileSize = intval($fileForUpload['size']);
    $fileNameForUpload = getFileNameForUpload(getDirRootForUpload($fileType, $uploadPropertis['roots']), $fileName);
    
    // Lets check the file (size, type, extension)
    if (isFileSizeLess2mb($fileSize, $uploadPropertis['allowedFileSize']) && isAllowedFileType($fileType, $uploadPropertis['allowedTypes']) && isAllowedFileExtension($fileExtension, $uploadPropertis['allowedExtension'])) {
        if (!isFileExist($fileNameForUpload)) {
            return move_uploaded_file($tmpFileName, $fileNameForUpload);
        }
    }
    return false;
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