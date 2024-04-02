<?php

namespace App\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;

class ErrorController extends CoreController
{
    public function error404()
    {
        $this->show("error404");
    }
}