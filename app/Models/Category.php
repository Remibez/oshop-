<?php

namespace App\Models;

use App\Utils\Database;
// PDO est deja integré à PHP, donc ici pas besoin de déclarer des namespace,juste un use PDO suffit 
use PDO;

class Category extends CoreModel
{
    // On définit les propriétés du model
    // Les propriétés du model sont tout simplement des propriétés qui font référence aux champs de la table category

    /**
     * Le champ name de la table category
     *
     * @var [string]
     */
    private $name;

    /**
     * Le champ subtitle de la table category
     *
     * @var [string]
     */
    private $subtitle;

    /**
     * Le champ picture de la table category
     *
     * @var [string]
     */
    private $picture;

    /**
     * Le champ home_order de la table category
     *
     * @var [int]
     */
    private $home_order;

    /**
     * Récupère les données d'un type via son id
     *
     * @param [int] $id
     */
    public function find($id)
    {
        // Ci dessous $sql c'est la requête sql qui va me permettre de récupérer la marque via son $id
        $sql = 'SELECT * FROM category WHERE id = '.$id.';';

        // Ici Database::getPDO() me retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();

        // Ici on va executer la requête $sql
        $pdoResult = $pdo->query($sql);

        // Ici je veux récupérer UN objet de Category, donc pas de tableau (pas de fetchAll)
        // fetchObject au lieu de fetchAll
        $category = $pdoResult->fetchObject(Category::class);

        return $category;
    }

    /**
     * Récupère toutes les catégories
     */
    public function findAll()
    {
        // Ci dessous $sql c'est la requête sql qui va me permettre de récupérer toutes les marques
        $sql = 'SELECT * FROM category;';

        // Ici Database::getPDO() me retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();

        // Ici on va executer la requête $sql
        $pdoResult = $pdo->query($sql);

        // Ci dessous $categories = un tableau classique en PHP
        // $categories = $pdoResult->fetchAll();

        // fetchAll avec l'argument PDO::FETCH_CLASS renvoie un aray qui contient tous mes résultats sous la forme d'objets de la classe spécifiée en 2eme argument (ici Category => Le model Category)
        // Ici $categories = tableau d'objet de la classe Category 
        $categories = $pdoResult->fetchAll(PDO::FETCH_CLASS, Category::class);

        return $categories;
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

    /**
     * Get le champ subtitle de la table category
     *
     * @return  [string]
     */ 
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set le champ subtitle de la table category
     *
     * @param  [string]  $subtitle  Le champ subtitle de la table category
     *
     * @return  self
     */ 
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get le champ picture de la table category
     *
     * @return  [string]
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set le champ picture de la table category
     *
     * @param  [string]  $picture  Le champ picture de la table category
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get le champ home_order de la table category
     *
     * @return  [int]
     */ 
    public function getHome_order()
    {
        return $this->home_order;
    }

    /**
     * Set le champ home_order de la table category
     *
     * @param  [int]  $home_order  Le champ home_order de la table category
     *
     * @return  self
     */ 
    public function setHome_order($home_order)
    {
        $this->home_order = $home_order;

        return $this;
    }


}
