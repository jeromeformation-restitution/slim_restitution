<?php
namespace App\Repository;

use App\Entity\Produit;
use App\Utilities\Database;

class ProductRepository
{


    /**
     * @var Database;
     */
    private $database;

    public function findAll():array
    {
        //requete SQL
        $query = "SELECT * FROM produit WHERE etat_publication = 1";
        // Exécution de la requête SQL et récupération des produits
        return $this->database->query($query, Produit::class);
    }

    public function __construct(Database $database)
    {
        $this->database=$database;
    }
}
