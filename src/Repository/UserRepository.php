<?php


namespace App\Repository;

use App\Entity\Produit;
use App\Entity\User;
use App\Utilities\AbstractRepository;
use App\Utilities\Database;

class UserRepository extends AbstractRepository
{


    /**
     * ajout du nom de la table;
     * @return string
     */
    public function tableName(): string
    {
        return 'app_user';
    }

    /**
     * ajout de la classe de l'entité
     * @return string
     */
    public function entityName(): string
    {
        return User::class;
    }
}
