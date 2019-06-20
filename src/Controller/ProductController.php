<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Utilities\AbstractController;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ProductController extends AbstractController
{

    public function liste(ServerRequestInterface $request, ResponseInterface $response, array $args)
    {
        // Requête SQL
        $query = "SELECT * FROM produit WHERE etat_publication = 1";
        // Exécution de la requête SQL et récupération des produits
        $products = $this->database->query($query, Produit::class);
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
}
