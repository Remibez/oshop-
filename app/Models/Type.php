<?php

namespace App\Models;

use App\Utils\Database;
// PDO est deja integré à PHP, donc ici pas besoin de déclarer des namespace,juste un use PDO suffit 
use PDO;

class Type extends CoreModel
{
    // On définit les propriétés du model
    // Les propriétés du model sont tout simplement des propriétés qui font référence aux champs de la table type


    /**
     * Le champ name de la table type
     *
     * @var [string]
     */
    private $name;

    /**
     * Récupère les données d'un type via son id donnée en paramètre
     *
     * @param [int] $id
     */
    public function find($id)
    {
        // Ci dessous $sql c'est la requête sql qui va me permettre de récupérer le type via son $id
        $sql = 'SELECT * FROM `type` WHERE id = '.$id.';';

        // Ici Database::getPDO() me retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();

        // Ici on va executer la requête $sql
        $pdoResult = $pdo->query($sql);

        // Ici je veux récupérer UN objet de Type, donc pas de tableau (pas de fetchAll)
        // fetchObject au lieu de fetchAll
        $type = $pdoResult->fetchObject(Type::class);

        return $type;
    }

    /**
     * Récupère les données de tous les types
     */
    public function findAll()
    {
        // Ci dessous $sql c'est la requête sql qui va me permettre de récupérer tous les types
        $sql = 'SELECT * FROM type;';

        // Ici Database::getPDO() me retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();

        // Ici on va executer la requête $sql
        $pdoResult = $pdo->query($sql);

        // Ci dessous $types = un tableau classique en PHP
        // $types = $pdoResult->fetchAll();

        // fetchAll avec l'argument PDO::FETCH_CLASS renvoie un aray qui contient tous mes résultats sous la forme d'objets de la classe spécifiée en 2eme argument (ici Type => Le model Type)
        // Ici $types = tableau d'objet de la classe Type 
        $types = $pdoResult->fetchAll(PDO::FETCH_CLASS, Type::class);

        return $types;
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