<?php

namespace App\Repositories;

use Core\Conexion;
use App\Models\Producto;
use App\Helpers\Response;

class ProductoRepo
{

  use Response;

  private $model;

  public function __construct()
  {
    Conexion::getInstance()->conexion();
    $this->model = new Producto();
  }

  public function allProducto()
  {
    return $this->model->get(['id', 'nombre','descripcion','stock','oferta','precio','precio_viejo','imagen']);
  }

}
