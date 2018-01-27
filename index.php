<?php

require_once (__DIR__ . "/vendor/autoload.php");
require ("app/configuration/router.php");
require ("app/configuration/database.php");


function myAutoload($className)
{
    $classPrices = explode('\\', $className);
    switch ($classPrices[0]) {
        case 'controller':
            require __DIR__ . '/src/' . implode(DIRECTORY_SEPARATOR, $classPrices) . '.php';
            break;
        case 'model':
            require __DIR__ . '/src/' . implode(DIRECTORY_SEPARATOR, $classPrices) . '.php';
            break;
        case 'service':
            require __DIR__ . '/src/' . implode(DIRECTORY_SEPARATOR, $classPrices) . '.php';
            break;
    }
}

spl_autoload_register("myAutoload");

global $twig;

$loader = new \Twig_Loader_Filesystem(__DIR__ . '/app/Resources/view');
$twig = new \Twig_Environment($loader);

global $route;

$tempRoute = filter_input(
    INPUT_GET,
    'route',
    FILTER_SANITIZE_SPECIAL_CHARS
);

$route = (is_null($tempRoute)) ? "" : $tempRoute;

/**
 * @var array $routes
 */
if (count($routes[$route]) > 0) {
    $url[0] = "controller\\" . $routes[$route]['controller'];
    if (strlen($routes[$route]['action']) > 0) {
        $url[1] = $routes[$route]['action'];
    }
} else if (isset($route)) {
    $url = $route;
    $url = rtrim($url, '/');
    $url = explode('/', $url);
}

/**
 * @var array $url
 */
$controller = new $url[0];

if (isset($url[2])) {
    $controller->$url[1]($url[2]);
} else {
    if (isset($url[1])) {
        $controller->$url[1]();
    }
}
