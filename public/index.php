<?php

use Core\Database;

require_once '../config/app.php';
require_once '../config/database.php';
require_once '../vendor/autoload.php';
require_once '../routes/api.php';

$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
//        throw new HttpResponseException('Route Not Found', 404);
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
//        throw new \http\Exception\BadMethodCallException('Method Not Allowed', 405);
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $handler = explode('@', $handler);
        $controller_name = $handler[0];
        $method_name = $handler[1];
        $controller = new $controller_name();
        $_SERVER = array_merge($_SERVER, $routeInfo[2]);
        return $controller->$method_name();
        break;
}