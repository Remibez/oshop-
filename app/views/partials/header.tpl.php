<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="<?=$absoluteURL?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$absoluteURL?>/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=$absoluteURL?>/assets/css/styles.css">
    <title>oShop</title>
</head>

<body>
    <header>
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row d-flex align-items-center">
                    <div class="col-sm-7 d-none d-sm-block">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item pr-3 mr-0">
                                <i class="fa fa-phone"></i> 01 02 03 04 05
                            </li>
                            <li class="list-inline-item px-3 border-left d-none d-lg-inline-block">Livraison offerte à partir de 100€</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <nav class="navbar navbar-expand-lg navbar-sticky navbar-airy navbar-light">
            <div class="container-fluid">
                <!-- Navbar Header  -->
                <a href="index.html" class="navbar-brand">oShop</a>
                <button type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
                <!-- Navbar Collapse -->
                <div id="navbarCollapse" class="collapse navbar-collapse">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a href="index.html" class="nav-link active">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Catégories</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <?php foreach($categories as $category): ?>
                                        <a class="dropdown-item" href="<?=$router->generate('category', ['id' => $category->getId()])?>"><?= $category->getName() ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Types de produits</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <?php foreach($types as $type): ?>
                                        <a class="dropdown-item" href="<?=$router->generate('type', ['id' => $type->getId()])?>"><?= $type->getName() ?></a>
                                    <?php endforeach; ?>                               
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <div class="dropdown">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">Marques</a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <?php foreach($brands as $brand): ?>
                                            <a class="dropdown-item" href="<?=$router->generate('marque', ['id' => $brand->getId()])?>"><?= $brand->getName() ?></a>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        
    </header>