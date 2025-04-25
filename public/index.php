<?php

// Activer l'affichage des erreurs (utile pour le débogage)
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/../app/routes.php';
require_once __DIR__ . '/../app/helpers/session.php';
require_once __DIR__ . '/../vendor/autoload.php'; 


use app\helpers\session;

Session::start();

$requestUri = $_SERVER['REQUEST_URI'];
$scriptName = $_SERVER['SCRIPT_NAME'];

$pathInfo = str_replace($scriptName, '', $requestUri);

$pathInfo = trim($pathInfo, '/');

$url = $pathInfo ?: 'home'; 



$routeFound = false;

foreach ($routes as $route => $action) {
    if ($url === $route) {
        [$controllerName, $method] = explode('@', $action);
        $controllerClass = "app\\controllers\\$controllerName";
        $controller = new $controllerClass();
        $controller->$method();

        $routeFound = true;
        break;
    }
}
if (!$routeFound) {
    http_response_code(404);
    require_once __DIR__ . '/../app/views/errors/404.php';
}