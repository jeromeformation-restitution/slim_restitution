<?php

// Fetch DI Container
use App\Controller\HomeController;
use App\Controller\ProductController;
use Psr\Container\ContainerInterface;
use Slim\Http\Environment;
use Slim\Http\Uri;
use Slim\Views\Twig;
use Slim\Views\TwigExtension;

$container = $app->getContainer();

// Register Twig View helper
$container['view'] = function ($c) {
$view = new Twig(dirname(__DIR__) . '/templates', [
'cache' => false
]);

// Instantiate and add Slim specific extension
$router = $c->get('router');

$uri = Uri::createFromEnvironment(new Environment($_SERVER));
$view->addExtension(new TwigExtension($router, $uri));

return $view;
};

$container[HomeController::class] = function (ContainerInterface $c) {
    return new HomeController($c->get('view'));
};

$container[ProductController::class] = function (ContainerInterface $c) {
    return new ProductController($c->get('view'));
};