<?php
session_start();
use DI\ContainerBuilder;
use Slim\App;

require '../vendor/autoload.php';

// PHP-DI
$builder = new ContainerBuilder();
$builder->addDefinitions(
    dirname(__DIR__) . '/config/container.php',
    dirname(__DIR__) . '/config/config.php'
);
$container = $builder->build();

$app = new App($container);

require dirname(__DIR__) . "/config/routes.php";

$app->run();
