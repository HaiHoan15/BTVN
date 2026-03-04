
<?php
session_start();

require_once 'app/helpers/SessionHelper.php';

$url = $_GET['url'] ?? '';
$url = rtrim($url, '/');
$url = filter_var($url, FILTER_SANITIZE_URL);
$url = explode('/', $url);

$controllerName = isset($url[0]) && $url[0] != ''
    ? ucfirst($url[0]) . 'Controller'
    : 'DefaultController';

$action = isset($url[1]) && $url[1] != ''
    ? $url[1]
    : 'index';

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

if (!SessionHelper::isLoggedIn() && !in_array($currentPage, $publicPages)) {
    header("Location: /webbanhang/Account/login");
    exit();
}

if (!file_exists('app/controllers/' . $controllerName . '.php')) {
    die('Controller not found');
}

require_once 'app/controllers/' . $controllerName . '.php';

$controller = new $controllerName();

if (!method_exists($controller, $action)) {
    die('Action not found');
}

call_user_func_array([$controller, $action], array_slice($url, 2));