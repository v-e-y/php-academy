<?php declare(strict_types=1);

/**
 * Undocumented function
 * @param array $field
 * @return bool
 */
function isNoEmptyFormFileField(array $field):bool {
    if ($field && is_array($field) && isset($_FILES['file_image'])) {
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

/**
 * Return short files type, like: pdf, jpg, png, csv
 * @param string $uploadFileName
 * @return string
 */
function getFileType(string $uploadFileName):string {
    return pathinfo($uploadFileName, PATHINFO_EXTENSION);
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
 * @param string $fileName
 * @param array $rootsForUpload
 * @return bool
 */
function isFileExist(string $fileName, array $rootsForUpload):bool {
    $rootForCheck = $rootsForUpload[getFileType($fileName)];
    return file_exists($rootForCheck);
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

function getFileNameForUpload(string $dirRootForUpload, string $fileName):string {
    return $dirRootForUpload . $fileName;
}

function letsUploadFile(string $tmpFileName, string $dirForUpload, string $fileName):bool {
    return move_uploaded_file($tmpFileName, getFileNameForUpload($dirForUpload, $fileName));
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