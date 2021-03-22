<?php 
require_once 'vendor/autoload.php';
define('_BASE_PATH_', __DIR__);

use Illuminate\Container\Container;
use Illuminate\Events\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Routing\Router;
use Illuminate\Routing\UrlGenerator;


//Create a service Container
$container = new Container;

$request = Request::capture();
$container->instance('Illuminate\Http\Request',$request);


$events = new Dispatcher($container);

$router = new Router($events, $container);

$globalMiddleware = [
  \App\Middleware\Clase::class
];


$routeMiddleware = [
  'auth' =>   \App\Middleware\Clase::class
];

foreach($routeMiddleware as $key => $middleware)
{
  $router->aliasMiddleware($key,$middleware);
}


require_once 'routes/web.php';
require_once 'config/app.php';

$redirect = new Redirector(new UrlGenerator($router->getRoutes(),$request));

$response = $router->dispatch($request);

$response->send();