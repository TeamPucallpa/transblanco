<?php

namespace App\Controllers;

use Core\Template;
use App\Repositories\ProductoRepo;
use Core\Validation;
use App\Helpers\Response;

class ProductoController extends Template
{

  use Validation, Response;

  public function __construct()
  {
    parent::__construct();
  }



  public function allProducto(){
    $model = new ProductoRepo();
    return $this->json($model->allProducto());
  }
}
