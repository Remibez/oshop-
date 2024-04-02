<?php

// Je declare ici que cette classe sera rangée dans le dossier virtuel App\Models;
namespace App\Models;

use App\Utils\Database;
// PDO est deja integré à PHP, donc ici pas besoin de déclarer des namespace,juste un use PDO suffit 
use PDO;

// Le nom de la classe doit être identique à la table qu'on veut manipuler (ici la table brand)
class Brand extends CoreModel
{
    // On définit les propriétés du model
    // Les propriétés du model sont tout simplement des propriétés qui font référence aux champs de la table brand

    /**
     * Le champ name de la table brand
     *
     * @var [string]
     */
    private $name;

    /**
     * Récupère les données d'un produit via son id
     *
     * @param [int] $id
     */
    public function find($id)
    {
        // Ci dessous $sql c'est la requête sql qui va me permettre de récupérer la marque via son $id
        $sql = 'SELECT * FROM brand WHERE id = '.$id.';';

        // Ici Database::getPDO() me retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();

        // Ici on va executer la requête $sql
        $pdoResult = $pdo->query($sql);

        // Ici je veux récupérer UN objet de Brand, donc pas de tableau (pas de fetchAll)
        // fetchObject au lieu de fetchAll
        $brand = $pdoResult->fetchObject(Brand::class);

        return $brand;
    }

    /**
     * Récupère les données de toutes les marques
     */
    public function findAll()
    {
        // Ci dessous $sql c'est la requête sql qui va me permettre de récupérer toutes les marques
        $sql = 'SELECT * FROM brand;';

        // Ici Database::getPDO() me retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();

        // Ici on va executer la requête $sql
        $pdoResult = $pdo->query($sql);

        // Ci dessous $brands = un tableau classique en PHP
        // $brands = $pdoResult->fetchAll();

        // fetchAll avec l'argument PDO::FETCH_CLASS renvoie un aray qui contient tous mes résultats sous la forme d'objets de la classe spécifiée en 2eme argument (ici Brand => Le model Brand)
        // Ici $brands = tableau d'objet de la classe Brand 
        $brands = $pdoResult->fetchAll(PDO::FETCH_CLASS, Brand::class);

        return $brands;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}