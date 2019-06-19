<?php

use App\Controller\HomeController;
use App\Controller\ProductController;


$app->get('/homepage', HomeController::class . ":home");

$app->group('/produit', function()
{
    $this->get('/liste', ProductController::class . ":liste");
    $this->get('/{id:\d+}', ProductController::class . ":show");
});