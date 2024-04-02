<?php

namespace App\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;

class MainController extends CoreController
{
    public function home()
    {
        $this->show("home");
    }

    public function legalMentions()
    {
        $this->show("legalMentions");
    }

    public function toto()
    {
        $brand = new Brand();

        dump($brand->find(3));

        $category = new Category();

        dump($category->find(4));

        dump($category->findAll());
        $type = new Type();

        dump($type->find(2));

        dump($type->findAll());

        $product = new Product();

        dump($product->find(9));

        dump($product->findAll());
    }
}