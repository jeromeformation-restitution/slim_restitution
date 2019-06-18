<?php
namespace App\Controller;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProductController {
    public function liste(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {

        $response->getBody()->write("Hello2");

        return $response;
    }
    public function show(ServerRequestInterface $request,ResponseInterface $response, array $args)
    {
        $index = $args["id"];
        $response->getBody()->write("Page de mes produits" . $index);

        return $response;
    }
}
