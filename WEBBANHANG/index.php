<?php
session_start();

require_once 'app/helpers/SessionHelper.php';
require_once 'vendor/autoload.php';

$url = $_GET['url'] ?? '';
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

// $controllerName = isset($url[0]) && $url[0] != ''
//     ? ucfirst($url[0]) . 'Controller'
//     : 'DefaultController';

// $action = isset($url[1]) && $url[1] != ''
//     ? $url[1]
//     : 'index';

// dieuhuong API
if (isset($url[0]) && $url[0] === 'api') {

    $controllerName = isset($url[1])
        ? ucfirst($url[1]) . 'ApiController'
        : 'DefaultApiController';

    $controllerPath = 'app/controllers/api/' . $controllerName . '.php';

    $action = isset($url[2]) ? $url[2] : 'index';

    $params = array_slice($url, 3);

} else {

    $controllerName = isset($url[0]) && $url[0] != ''
        ? ucfirst($url[0]) . 'Controller'
        : 'DefaultController';

    $controllerPath = 'app/controllers/' . $controllerName . '.php';

    $action = isset($url[1]) && $url[1] != ''
        ? $url[1]
        : 'index';

    $params = array_slice($url, 2);
}

// Danh sách trang public (không cần login)
$publicPages = [
    // Account
    'AccountController/login',
    'AccountController/register',
    'AccountController/store',
    'AccountController/authenticate',

    // Trang chủ
    'DefaultController/index',

    // Sản phẩm cho user
    'ProductController/index',
    'ProductController/show'
];

$currentPage = $controllerName . '/' . $action;

if ($url[0] !== 'api' && !SessionHelper::isLoggedIn() && !in_array($currentPage, $publicPages)) {
    header("Location: /webbanhang/Account/login");
    exit();
}

if (!file_exists($controllerPath)) {
    die('Controller not found');
}

require_once $controllerPath;

$controller = new $controllerName();

if (!method_exists($controller, $action)) {
    die('Action not found');
}

error_log("[INDEX] Before calling action - buffer level: " . ob_get_level());

call_user_func_array([$controller, $action], $params);

error_log("[INDEX] After calling action - buffer level: " . ob_get_level());