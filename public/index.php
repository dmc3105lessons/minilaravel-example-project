<?php
require_once __DIR__ . "/../vendor/autoload.php";

use App\Controller\UserController;
use App\Model\User;
use App\Repository\MiniLaravel\UserRepositoryMiniLaravel;
use App\Repository\UserRepositoryInterface;
use MiniLaravel\Di\Container;
use MiniLaravel\Orm\Model;
use MiniLaravel\Orm\Database;
use MiniLaravel\Routing\Response;
use MiniLaravel\Routing\Router;
use MiniLaravel\Routing\TemplatePathRegexCompiler;
use MiniLaravel\Routing\TemplateRouteRegexCompilerFactory;

$container = new Container();
$container->singleton(UserRepositoryInterface::class, UserRepositoryMiniLaravel::class);
$container->singleton(TemplateRouteRegexCompilerFactory::class, TemplateRouteRegexCompilerFactory::class, new TemplateRouteRegexCompilerFactory(new TemplatePathRegexCompiler()));

$router = new Router($container);
$router->controller(UserController::class);

$databaseFile = __DIR__ . '/database.sqlite';
$database = new Database("sqlite:" . $databaseFile, null, null, [
    
]);
Model::setDatabase($database);
$response = $router->dispatch();
$response->send();

