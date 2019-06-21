<?php


namespace App\Utilities;

use App\Entity\User;

abstract class AbstractRepository
{
    /**
     * @var Database;
     */
    protected $database;

    public function __construct(Database $database)
    {
        $this->database=$database;
    }

    /**
     * ajout du nom de la table;
     * @return string
     */
    abstract public function tableName():string;

    /**
     * ajout de la classe de l'entité
     * @return string
     */
    abstract public function entityName():string;


    public function findAll():array
    {
        //requete SQL
        $query = "SELECT * FROM ".$this->tableName();
        // Exécution de la requête SQL et récupération des produits
        return $this->database->query($query, $this->entityName());
    }
}
