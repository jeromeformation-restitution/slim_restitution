<?php

use App\Controller\ProductController;
use \Psr\Http\Message\ServerRequestInterface;
use \Psr\Http\Message\ResponseInterface;
use Slim\App;

require '../vendor/autoload.php';

$config = require dirname(__DIR__) . "/config/config.php";
$app = new App($config);

require dirname(__DIR__) . "/config/routes.php";

$app->run();
