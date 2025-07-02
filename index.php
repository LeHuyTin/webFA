<?php

session_start();
ob_start();
include "./MVC/Models/connect.php";
conn();

// Điều hướng yêu cầu đến controller tương ứng
if (isset($_GET['url'])) {
    $url = explode('/', $_GET['url']);
    $controller = !empty($url[0]) ? $url[0] : 'index';
    $action = isset($url[1]) && $url[1] !== '' ? $url[1] : 'index';
} else {
    $controller = 'index';
    $action = 'index';
}

// Controller và action
$controllerFile = './MVC/Controllers/' . ucfirst($controller) . 'Controller.php';
if (file_exists($controllerFile)) {
    require_once($controllerFile);


    $controllerName = ucfirst($controller) . 'Controller';
    $controller = new $controllerName();
    $controller->$action();
} else {
    echo "Controller not found.";
}
