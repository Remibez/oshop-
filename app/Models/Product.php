<?php

namespace App\Models;

use App\Utils\Database;
// PDO est deja integré à PHP, donc ici pas besoin de déclarer des namespace,juste un use PDO suffit 
use PDO;

class Product extends CoreModel
{
    /**
     * Nom du produit
     *
     * @var [string]
     */
    private $name;
    
    /**
     * Description du produit
     *
     * @var [string]
     */
    private $description;
    
    /**
     * Image du produit
     *
     * @var [string]
     */
    private $picture;
    
    /**
     * Prix du produit
     *
     * @var [float]
     */
    private $price;
    
    /**
     * Note du produit
     *
     * @var [int]
     */
    private $rate;

    /**
     * Status du produit
     *
     * @var [type]
     */
    private $status;

    
    /**
     * Id de la marque du produit (FK)
     *
     * @var [int]
     */
    private $brand_id;
    
    /**
     * Id de la catégorie du produit (FK)
     *
     * @var [int]
     */
    private $category_id;
    
    /**
     * Id du type du produit
     *
     * @var [int]
     */
    private $type_id;

    /**
     * Récupère les données d'un product via son id
     *
     * @param [int] $id
     */
    public function find($id)
    {
        // Ci dessous $sql c'est la requête sql qui va me permettre de récupérer le product via son $id
        $sql = 'SELECT * FROM `product` WHERE id = '.$id.';';

        // Ici Database::getPDO() me retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();

        // Ici on va executer la requête $sql
        $pdoResult = $pdo->query($sql);

        // Ici je veux récupérer UN objet de Product, donc pas de tableau (pas de fetchAll)
        // fetchObject au lieu de fetchAll
        $product = $pdoResult->fetchObject(Product::class);

        return $product;
    }

    /**
     * Récupère les données de tous les products
     */
    public function findAll()
    {
        // Ci dessous $sql c'est la requête sql qui va me permettre de récupérer tous les products
        $sql = 'SELECT * FROM product;';

        // Ici Database::getPDO() me retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();

        // Ici on va executer la requête $sql
        $pdoResult = $pdo->query($sql);

        // Ci dessous $products = un tableau classique en PHP
        // $products = $pdoResult->fetchAll();

        // fetchAll avec l'argument PDO::FETCH_CLASS renvoie un aray qui contient tous mes résultats sous la forme d'objets de la classe spécifiée en 2eme argument (ici Type => Le model Type)
        // Ici $products = tableau d'objet de la classe Type 
        $products = $pdoResult->fetchAll(PDO::FETCH_CLASS, Product::class);

        return $products;
    }

    
    /**
     * Set id du produit
     *
     * @param  [int]  $id  Id du produit
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get nom du produit
     *
     * @return  [string]
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set nom du produit
     *
     * @param  [string]  $name  Nom du produit
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get description du produit
     *
     * @return  [string]
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set description du produit
     *
     * @param  [string]  $description  Description du produit
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get image du produit
     *
     * @return  [string]
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set image du produit
     *
     * @param  [string]  $picture  Image du produit
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }

    /**
     * Get prix du produit
     *
     * @return  [float]
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set prix du produit
     *
     * @param  [float]  $price  Prix du produit
     *
     * @return  self
     */ 
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get note du produit
     *
     * @return  [int]
     */ 
    public function getRate()
    {
        return $this->rate;
    }

    /**
     * Set note du produit
     *
     * @param  [int]  $rate  Note du produit
     *
     * @return  self
     */ 
    public function setRate($rate)
    {
        $this->rate = $rate;

        return $this;
    }

    /**
     * Get status du produit
     *
     * @return  [type]
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set status du produit
     *
     * @param  [type]  $status  Status du produit
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get id de la marque du produit (FK)
     *
     * @return  [int]
     */ 
    public function getBrand_id()
    {
        return $this->brand_id;
    }

    /**
     * Set id de la marque du produit (FK)
     *
     * @param  [int]  $brand_id  Id de la marque du produit (FK)
     *
     * @return  self
     */ 
    public function setBrand_id($brand_id)
    {
        $this->brand_id = $brand_id;

        return $this;
    }

    /**
     * Get id de la catégorie du produit (FK)
     *
     * @return  [int]
     */ 
    public function getCategory_id()
    {
        return $this->category_id;
    }

    /**
     * Set id de la catégorie du produit (FK)
     *
     * @param  [int]  $category_id  Id de la catégorie du produit (FK)
     *
     * @return  self
     */ 
    public function setCategory_id($category_id)
    {
        $this->category_id = $category_id;

        return $this;
    }

    /**
     * Get id du type du produit
     *
     * @return  [int]
     */ 
    public function getType_id()
    {
        return $this->type_id;
    }

    /**
     * Set id du type du produit
     *
     * @param  [int]  $type_id  Id du type du produit
     *
     * @return  self
     */ 
    public function setType_id($type_id)
    {
        $this->type_id = $type_id;

        return $this;
    }
}