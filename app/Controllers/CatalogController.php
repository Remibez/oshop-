<?php

namespace App\Controllers;

// Pas besoin de use CoreController car on l'etnds et parce qu'on est dans le meme namespace

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;

class CatalogController extends CoreController
{
    public function category(array $params)
    {
        $id = (int)$params["id"];

        // Maintenant qu'on a l'id, on va pouvoir l'utiliser pour rechercher la bonne catégorie en BDD.

        $this->show("products_list", ['id' => $id]);
    }

    public function type(array $params)
    {
        $id = (int)$params["id"];

        // Maintenant qu'on a l'id, on va pouvoir l'utiliser pour rechercher la bonne catégorie en BDD.

        $this->show("type", ['typeId' => $id]);
    }

    public function marque(array $params)
    {
        $id = (int)$params["id"];

        // Maintenant qu'on a l'id, on va pouvoir l'utiliser pour rechercher la bonne catégorie en BDD.

        $this->show("marque", ['marqueId' => $id]);
    }

    public function produit(array $params)
    {
        $id = (int)$params["id"];

        // Maintenant qu'on a l'id, on va pouvoir l'utiliser pour rechercher la bonne catégorie en BDD.

        $this->show("produit", ['produitId' => $id]);
    }
}