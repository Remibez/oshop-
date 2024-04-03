<?php

namespace App\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;

class CoreController
{
    /**
     * Affiche la page
     *
     * @param string $viewName
     * @param array $viewData (Facultatif)
     */
    protected function show($viewName, $viewData = [])
    {
        // Ici je vais récupérer toutes les catégories qui sont dans ma bdd
        // Car je vais en avoir besoin pour les afficher dans mon header (liste déroulantes catégories)
        // Ci dessous je créer une instance du model Category
        $categoryModel = new Category();

        // Maintenant je vais executer la méthode findAll du model pour récupérer et stocker TOUTES les catégories
        $categories = $categoryModel->findAll();
        //dump($categories);

        // Ici je vais récupérer toutes les catégories qui sont dans ma bdd
        // Car je vais en avoir besoin pour les afficher dans mon header (liste déroulantes catégories)
        // Ci dessous je créer une instance du model Category
        $brandModel = new Brand();

        // Maintenant je vais executer la méthode findAll du model pour récupérer et stocker TOUTES les catégories
        $brands = $brandModel->findAll();
        // dump($brands);

        
        $typesModel = new Type();

        $types = $typesModel->findAll();

        // Ici je vais rendre "global" mon objet $router (instance de AltoRouter de l'index.php)
        global $router;

        $absoluteURL = $_SERVER['BASE_URI'];
        require_once __DIR__ . "/../views/partials/header.tpl.php";
        require_once __DIR__ . "/../views/$viewName.tpl.php";
        require_once __DIR__ . "/../views/partials/footer.tpl.php";
    }
}