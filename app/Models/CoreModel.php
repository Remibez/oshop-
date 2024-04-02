<?php

namespace App\Models;

use App\Utils\Database;
// PDO est deja integré à PHP, donc ici pas besoin de déclarer des namespace,juste un use PDO suffit 
use PDO;

// CoreModel => Le modele de base : c'est la classe mère de tous les autres models
// Cette classe n'est pas destinée à être instancié
class CoreModel
{
    // Ici on veut éviter de répéter les propriétés présentes dans tous les Models
    // On factorise dans la classe "parent" de tous les Model (la classe parent c'est ici meme CoreModel)
    // Chacune des propriétés doivent être en protected car les classes enfants vont en hériter

    /**
     * Id
     *
     * @var [int]
     */
    protected $id;
    
    /**
     * Date de création
     *
     * @var [date]
     */
    protected $created_at;

    /**
     * Date de maj
     *
     * @var [date]
     */
    protected $updated_at;


    /**
     * Get id
     *
     * @return  [int]
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id
     *
     * @param  [int]  $id  Id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get date de création
     *
     * @return  [date]
     */ 
    public function getCreated_at()
    {
        return $this->created_at;
    }

    /**
     * Set date de création
     *
     * @param  [date]  $created_at  Date de création
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get date de maj
     *
     * @return  [date]
     */ 
    public function getUpdated_at()
    {
        return $this->updated_at;
    }

    /**
     * Set date de maj
     *
     * @param  [date]  $updated_at  Date de maj
     *
     * @return  self
     */ 
    public function setUpdated_at($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}