<?php

namespace App\Repositories;

use Core\Conexion;
use App\Models\Cliente;
use App\Helpers\Response;

class ClienteRepo
{

  use Response;

  private $model;

  public function __construct()
  {
    Conexion::getInstance()->conexion();
    $this->model = new Cliente();
  }


  public function get(int $id)
  {
    return $this->model->find($id, ['nombre', 'apellido']);
  }

  public function save($data)
  {

    $opciones = [ 'cost' => 12 ];

    try {
      $this->model->nombre = $data['nombre'];
      $this->model->apellido = $data['apellido'];
      $this->model->ruc_dni = $data['ruc'];
      $this->model->direccion = $data['direccion'];
      $this->model->celular = $data['celular'];
      $this->model->pass = password_hash($data['pass'], PASSWORD_BCRYPT, $opciones);
      $this->model->latitud = $data['lat'];
      $this->model->longitud = $data['lon'];
      // $this->model->created_at = date("Y-m-d H:i:s");
      // $this->model->updated_at = date("Y-m-d H:i:s");
      $this->model->save();
      return $this->setResponse(true, "Registro correcto");
    } catch (\Exception $ex) {
      return $this->setResponse(false, $ex->getMessage());
    }
  }

  public function validarCelular($celular)
  {
    return $this->model->where('celular',$celular)->first(['nombre','apellido','ruc_dni','direccion','celular','pass']);
  }


  public function allProducto()
  {
    return $this->model->get(['id', 'nombre','descripcion','stock','oferta','precio','precio_viejo','imagen']);
  }

}
