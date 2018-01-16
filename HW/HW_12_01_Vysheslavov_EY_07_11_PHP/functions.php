<?php declare(strict_types=1);
/*
* Vysheslavov E.Y. (07_11_PHP) [v-e-y@outlook.com]
* Home work from 12.01
* Task: Сделайте две страницы: index.php и hello.php. 
* При заходе на index.php спросите с помощью формы имя пользователя, запишите его в сессию. 
* При заходе на hello.php поприветствуйте пользователя фразой "Привет, %Имя%!".
* Создать сайт из четырех страниц. На четвертой странице пользователь видит список страниц, которые он посещал.
*/


/**
 * Check post value
 * @param string $fieldValue
 * @param array $appConf
 * @return bool
 */
function checkFieldValue(string $fieldValue, array $appConf):bool {
    // var_dump($fieldValue, $appConf.minLength);
    if (is_string($fieldValue) && strlen($fieldValue) > $appConf['minLength']) {
        return true;
    }
    return false;
}


/**
 * Decide which content to show.
 * @param string $request
 * @param array $routs
 * @return void
 */
// TODO rename function.
function routing(string $request, array $routs):void {
    $request = ($request === '/') ? $request : ltrim(strtolower($request), '/');
    if (array_key_exists($request, $routs)) {
        require_once($routs[$request]);
    } else {
        require_once($routs['404']);
    }   
}

/**
 * Collect pages which user saw
 * @param string $request
 * @param array $sitePages
 * @return void
 */
function collectViewedPages(string $request, array $sitePages):void {
    $request = ($request === '/') ? $request : ltrim(strtolower($request), '/');
    if (array_key_exists($request, $sitePages)) {
        $request = ($request === '/') ? 'home' : $request;
        if (!isset($_SESSION['pages'])) {
            $_SESSION['pages'][] = $request;
        } elseif (!in_array($request, $_SESSION['pages'])) {
            $_SESSION['pages'][] = $request;
        }
    }

}