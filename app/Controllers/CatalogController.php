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
    $categoryModel = new Category();

    // Récupérer la catégorie correspondant à l'ID
    $category = $categoryModel->find($id);
    // dump($category);
    // Afficher la vue en passant les données de la catégorie
    $this->show("products_list", [
        
        'category' => $category,
    ]);
}
    public function type(array $params)
    {

        $id = (int)$params["id"];
        
        $typeModel = new Type();

        
        $type = $typeModel->find($id);
        // Maintenant qu'on a l'id, on va pouvoir l'utiliser pour rechercher la bonne catégorie en BDD.

        dump($type);
        $this->show("type", ['typeId' => $id]);
    }

    public function brand(array $params)
    {
        $id = (int)$params["id"];
        $brandModel = new Brand();

        
        $brands = $brandModel->find($id);
        // Maintenant qu'on a l'id, on va pouvoir l'utiliser pour rechercher la bonne catégorie en BDD.

        $this->show("brand", ['brandId' => $id]);
    }

    public function produit(array $params)
    {
        $id = (int)$params["id"];
        $productModel = new Product();
        $product = $productModel->find($id);
        $this->show("product_list", ['product' => $product]);
        // Maintenant qu'on a l'id, on va pouvoir l'utiliser pour rechercher la bonne catégorie en BDD.

        $this->show("produit", ['produitId' => $id]);
    }
}