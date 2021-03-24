<?php

namespace App\Repositories;

use Core\Conexion;
use App\Models\Pedido;
use App\Helpers\Response;
use Illuminate\Database\Capsule\Manager as DB;


class PedidoRepo
{

  use Response;

  private $model;

  public function __construct()
  {
    Conexion::getInstance()->conexion();
    $this->model = new Pedido();
  }



  public function save($data)
  {
    try {
      $this->model->cliente_id = $data['cliente'];
      $this->model->fecha = $data['fecha'];
      $this->model->tipo_pago = $data['tipo_pago'];
      $this->model->total = $data['total'];
      $this->model->subtotal = $data['subtotal'];
      $this->model->impuesto = $data['impuesto'];
      $this->model->descuento = $data['descuento'];
      $this->model->estado = 1;

      $this->model->save();

      $id = $this->model->id;
      $detalleProducto = json_decode($data['detalle'], true);

      foreach ($detalleProducto as $key)
      {
        DB::table("detalle")->insert([
          "pedido_id" => $id,
          "producto_id" => $key['id'],
          "precio" => $key['precio'],
          "cant" => $key['cantidad'],
          "subtotal" => $key['total'],
          "total" => $key['total'],
          "promocion" => 0,
        ]);
      }
      return $this->setResponse(true, "Registro correcto");
    } catch (\Exception $ex) {
      return $this->setResponse(false, $ex->getMessage());
    }
  }


}
