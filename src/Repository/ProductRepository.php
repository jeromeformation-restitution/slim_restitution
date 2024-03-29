<?php
namespace App\Repository;

use App\Entity\Produit;
use App\Entity\User;
use App\Utilities\AbstractRepository;
use App\Utilities\Database;

class ProductRepository extends AbstractRepository
{



    /**
     * ajout du nom de la table;
     * @return string
     */
    public function tableName(): string
    {
        return 'produit';
    }

    /**
     * ajout de la classe de l'entité
     * @return string
     */
    public function entityName(): string
    {
        return Produit::class;
    }
}
