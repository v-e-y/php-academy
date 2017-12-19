<?php declare(strict_types=1);


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
    } else {
        uploadErrors('Something wrong with upload array');
        return false;
    }
}

/**
 * Get file name
 * @param string $fileName
 * @return string
 */
function getFileName(string $uploadfileName):string {
    return basename($uploadfileName) ?? uploadErrors('Something wrong with getFileName');
}

// TODO Hmmm, maby trash
function getTmpFileName(string $tmpFileName):string {
    return $tmpFileName ?? uploadErrors('Something wrong with getTmpFileName');
}

/**
 * Return short files type, like: pdf, jpg, png, csv
 * @param string $uploadFileName
 * @return string
 */
function getFileType(string $uploadFileName):string {
    return pathinfo($uploadFileName, PATHINFO_EXTENSION) ?? uploadErrors('Something wrong with getFileType');
}

/**
 * Check upload file type for allowed in App
 * @param string $uploadFileType
 * @param array $allowedFormats
 * @return bool
 */
function isAllowedFileType(string $uploadFileType, array $allowedFormats):bool {
    if (in_array($uploadFileType, $allowedFormats)) {
        return true;
    } else {
        uploadErrors('Something wrong with isAllowedFileType');
        return false;
    }
}

/**
 * Check file upload size
 * @param int $fileSize
 * @param int $fileMaxSize
 * @return bool
 */
function isFileSizeLess2mb(int $fileSize, int $fileMaxSize):bool {
    return $fileSize <= $fileMaxSize ?? uploadErrors('Something wrong with isFileSizeLess2mb');   
}

/**
 * Check is file exist
 * @param string $fileName
 * @param array $rootsForUpload
 * @return bool
 */
function isFileExist(string $fileName, array $rootsForUpload):bool {
    $rootForCheck = $rootsForUpload[getFileType($fileName)];
    return file_exists($rootForCheck) ?? uploadErrors('Something wrong with isFileExist');
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
// TODO що краще, кожного разу викликати функції чи в зробити змінні (fileName, fileType, nameForUpload e.t.c.) і потім працювати зі змінними?
function letsUploadFile(array $fileForUpload, array $uploadPropertis):bool {
    // Lets check the file (size, format)
    // TODO to long, to many code. 
    if (isFileSizeLess2mb($fileForUpload['size'], $uploadPropertis['filesSize']) && isAllowedFileType(getFileType($fileForUpload['name']), $uploadPropertis['allowedTypes'])) {
        if (!isFileExist(getFileName($fileForUpload['name']), getDirRootForUpload(getFileType($fileForUpload['name']), $uploadPropertis['roots']))) {
            // Check(визначаємо) what dir use for upload
            $dirRootForUpload = getDirRootForUpload(getFileType($fileForUpload['name']), $uploadPropertis['roots']);
            // Upload file
            return move_uploaded_file(getTmpFileName($fileForUpload['tmp_name']), getFileNameForUpload($dirRootForUpload, getFileName($fileForUpload['name'])));
        }
    }
    uploadErrors('Something wrong with letsUploadFile');
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