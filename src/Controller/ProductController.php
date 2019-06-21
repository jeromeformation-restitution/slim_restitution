<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Repository\ProductRepository;
use App\Utilities\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class ProductController extends AbstractController
{
    /**
     * @var ProductRepository
     */
    private $productRepository;





    public function liste(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $products=$this->productRepository->findAll();

        return $this->twig->render(
            $response,
            'products/liste.twig',
            ['products' => $products
            ]
        );
    }

    public function show(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        $id = $args["id"];
        $query = "SELECT * FROM produit WHERE etat_publication = 1 AND id = ?";
        $product = $this->database->queryPrepared($query, Produit::class, [$id]);
        if (empty($product)) {
            return $this->twig->render($response, 'errors/error404.twig')->withStatus(404);
        }
        return $this->twig->render(
            $response,
            'products/details.twig',
            ["product" => $product[0]
            ]
        );
    }


    public function __construct(Twig $twig, ProductRepository $productRepository)
    {
        $this->productRepository=$productRepository;

        parent::__construct($twig);
    }
}
