<?php

use App\Controller\ProductController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

$app->get('/homepage', function (ServerRequestInterface $request, ResponseInterface $response, array $args)
{

    $response->getBody()->write('<a href="/produit/liste"><h1>Hello</h1></a>');

    return $response;
});

$app->group('/produit', function()
{
    $this->get('/liste', ProductController::class . ":liste");

    $this->get('/{id:\d+}', ProductController::class . ":show");
});