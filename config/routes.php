<?php

use App\Controller\HomeController;
use App\Controller\ProductController;
use App\Controller\UserController;

$app->get('/homepage', HomeController::class . ":home");
$app->get('/user', UserController::class . ":liste");

$app->group('/produit', function () {
    $this->get('/liste', ProductController::class . ":liste");
    $this->get('/{id:\d+}', ProductController::class . ":show");
});
