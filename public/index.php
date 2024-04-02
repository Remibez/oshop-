<?php

// Ici le fichier index.php c'est le Front Controller" => c'est le point d'entrée de mon application web

// Chargement des dépendances récupérées avec composer
require_once __DIR__ . "/../vendor/autoload.php";

use App\Controllers\MainController;
use App\Controllers\ErrorController;
use App\Controllers\CatalogController;

// On crée une instance de AltoRouter pour pouvoir utiliser ses méthodes
$router = new AltoRouter();

// On spéficie d'où on part pour nos routes
// $_SERVER est une variable spéciale qui contient tout un tas d'informations.
// Attention, entre 2 machines on ne trouvera pas toujours les mêmes clés dans le tableau.
$router->setBasePath($_SERVER["BASE_URI"]);
// Identique à
// $router->setBasePath("/Formations/Socle-PHP/Nem/S05/S05-projet-oShop-Raginwald/public");

$router->map('GET', '/', [
    'controller' => MainController::class, // C'est le FQCN de notre classe MainController
    'method' => 'home'
], 'home'); // Le dernier parametre 'home' => c'est le nom qu'on donne a la route
$router->map('GET', '/category/[i:id]', [
    'controller' => CatalogController::class, // Ca equivaut à App\Controllers\CatalogController::class
    'method' => 'category'
], 'category');
$router->map('GET', '/mentions-legales', [
    'controller' => MainController::class,
    'method' => 'legalMentions'
], 'legalMentions');
$router->map('GET', '/types/[i:id]', [
    'controller' => CatalogController::class,
    'method' => 'type'
], 'type');
$router->map('GET', '/marques/[i:id]', [
    'controller' => CatalogController::class,
    'method' => 'marque'
], 'marque');
$router->map('GET', '/produit/[i:id]', [
    'controller' => CatalogController::class,
    'method' => 'produit'
], 'produit');

// TEST
$router->map('GET', '/toto', [
    'controller' => MainController::class,
    'method' => 'toto'
]);


// dump($_SERVER);
// Ici je mets en place les routes définis juste en haut
$match = $router->match();

// On crée le router
// On rentre dans le if si l'url tapé par l'utilisateur "matche" avec l'une des routes définit un peu plus haut
if ($match) {
    // On appelle la bonne page (bonne méthode de bon controller)
    // On créer une instance du controlller (par ex: On créer une instance de MainController si la route c'est '/')
    $controller = new $match['target']['controller']();
    $method = $match['target']['method'];

    // Le dispatcher
    // Et ici on execute la méthode adapté (par ex: si la route c'est '/', on va executer la methode home() du MainController)
    $controller->$method($match["params"]);
} else {
    // On rentre dans le else au cas ou l'url tapé ne "matche" avec aucune de nos routes
    // Erreur 404
    $controller = new ErrorController();
    $controller->error404();
}
