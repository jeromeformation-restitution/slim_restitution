<?php
namespace App\Controller;

use App\Utilities\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class HomeController extends AbstractController
{
    public function home(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        return $this->twig->render($response, 'index.twig');
    }
}
