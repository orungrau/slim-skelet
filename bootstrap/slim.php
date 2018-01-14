<?php
/**
 * Created by PhpStorm.
 * User: orungrau
 * Date: 14/01/2018
 * Time: 03:41
 */

require_once __DIR__.'/../vendor/autoload.php';

$app = new Slim\App([
    'settings' => require_once __DIR__.'/../config/slim.php',
]);

$container = $app->getContainer();

// Database
$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection(require_once __DIR__.'/../config/db.php');
$capsule->setAsGlobal();
$capsule->bootEloquent();

$container['db'] = function ($container) use ($capsule) {
    return $capsule;
};

// Controllers Autoload
$controllers = glob(__DIR__.'/../app/Controllers/*Controller.php', GLOB_BRACE);
foreach ($controllers as $c) {
    $controller = basename($c, '.php');

    $container[$controller] = function ($container) use ($controller) {
        $controller = 'App\Controllers\\'.$controller;
        return new $controller($container);
    };
}

// Middleware autoload
$middlewares = glob(__DIR__.'/../app/Middleware/*Middleware.php', GLOB_BRACE);
foreach ($middlewares as $m) {
    $middleware = basename($m, '.php');

    $container[$middleware] = function ($container) use ($middleware) {
        $middleware = 'App\Middleware\\'.$middleware;
        return new $middleware($container);
    };
}

// Route Autoload
$routes = glob(__DIR__.'/../routes/*.php');
foreach ($routes as $r) {
    require_once $r;
}


$app->run();