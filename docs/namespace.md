# Namespace

## Qu'est-ce que c'est qu'un namespace ?

Un Namespace est tout simplement un "dossier virtuel" dans lequel on va ranger nos classes.

L'intérêt des namespaces c'est :
. permet d'avoir plusieurs classes du même nom
. doit être déclaré au début du fichier
. n'est valable que pour le fichier même
. le séparateur de dossiers n'est pas le '/' mais le '\'

#### Voilà à quoi ressemble la déclaration d'un namespace pour le MainController
```php
<?php

namespace App\Controlllers;

class MainController extends CoreController
{
```
Avec cette ligne de déclaré au début du MainController.php, je déclare que ma classe MainController sera localisée dans le dossier virtuel `App\Controller`. Cette ligne sert surtout à définir l'endroit où ma classe MainController sera.
### Peut-on avoir une deuxième (ou +) classe dans ce namespace ?
Réponse => oui !
Dans un namespace il peut y avoir une infinité de classe. Par exemple ici dans mon namespace `App\Controller` je vais aussi avoir mon controller `CoreController`, mais aussi `ErrorController` et `CatalogController`.
#### Et comment déclarer ce namespace sur le CatalogController par exemple ?
```php
<?php

namespace App\Controllers;

class CatalogController extends CoreController
{
```
## D'accord, on a vu comment déclarer des namespace c'est bien, mais comment on va faire appel à une classe via les namespaces ?
Actuellement, notre maniére de faire est obsolète.
Ce qu'on fait, c'est que dans notre index.php, on fait une suite de `require_once` pour charger toutes les resources nécessaires. 
Enfaite notre machine interpète ça :
```php
require_once __DIR__ . "/../app/Controllers/CoreController.php";
require_once __DIR__ . "/../app/Controllers/ErrorController.php";
require_once __DIR__ . "/../app/Controllers/MainController.php";
require_once __DIR__ . "/../app/Controllers/CatalogController.php";
require_once __DIR__ . "/../app/Models/CoreModel.php";
require_once __DIR__ . "/../app/Models/Brand.php";
require_once __DIR__ . "/../app/Models/Product.php";
require_once __DIR__ . "/../app/Models/Category.php";
require_once __DIR__ . "/../app/Models/Type.php";
require_once __DIR__ . "/../app/Utils/Database.php";
```
Comme si dans le fichier index.php j'avais toutes mes classes côte à côte.
Genre :
```php
class MainController
{
    // Code de la classe MainController
    // ...
}

class CatalogController
{
    // Code de la classe CatalogController
    // ...
}
// ... etc pareil pour toutes les autres classes qui sont require
```
Mais il y a une problématique à ça => c'est que ça va alourdir notre site, car toutes les resources seront chargés même quand on en a pas besoin.
Par exemple si on accède à la route error, la méthode show du ErrorController sera sollicité mais il n'y a besoin que du `ErrorController` et du `CoreController`, sauf que ici, TOUTES LES RESOURCES qui sont require seront chargés => C'EST UN PROBLEME !

#### Et les namespaces vont régler ça
Enfaite l'intérêt des namespaces c'est de charger uniquement les resources dont on a besoin.

### Pour faire appel à une classe via les namespaces
Il suffit d'utiliser le mot clé `use` suivi du namespace de la classe dont on a besoin + du nom de la classe.
Par exemple :
Dans la classe `ErrorController` on a besoin de la classe `CoreController`.
Pour faire appel au `CoreController` depuis `ErrorController`, on va faire comme ça :
```php
namespace App\Controllers;

// use + namespace du CoreController + le nom de la classe (ici CoreController, on raisonne en classe et pas en fichier donc pas de CoreController.php)
use App\Controllers\CoreController;

class ErrorController extends CoreController
{
    public function error404()
    {
        // La méthode show ci dessous est déclaré dans le CoreController
        $this->show("error404");
    }
}
```
## FQCN (Fully Qualified Class Name)
Si par exemple je veux executer la méthode show sans passer par `use App\Controllers\CoreController;` et sans le extends, je vais devoir utiliser le FQCN (Fully Qualified Class Name)
Voilà ce que ça donnerais :
```php
namespace App\Controllers;

class ErrorController
{
    public function error404()
    {
        // Je mets le chemin absolue du namespace jusqu'à la classe
        $coreController = new App\Controllers\CoreController();
        // La méthode show ci dessous est déclaré dans le CoreController
        $coreController->show("error404");
    }
}
```
