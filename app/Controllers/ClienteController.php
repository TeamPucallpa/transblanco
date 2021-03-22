<?php

namespace App\Controllers;

use Illuminate\Http\Request;
use Core\Template;
use App\Repositories\ClienteRepo;
use Core\Validation;
use App\Helpers\Response;
use App\Models\Cliente;

class ClienteController extends Template
{

  use Validation, Response;

  public function __construct()
  {
    parent::__construct();
  }

  public function index(Request $request)
  {
    $clientes = (new ClienteRepo())->get(1);
    // die(print_r($clientes->nombre));
    return $this->render("cliente/index.twig", compact('clientes'));
  }

  public function store(Request $request)
  {
    $model = new ClienteRepo();

    $validator = $this->validar(
      $request->all(),
      [
        'nombre' => ['required'],
        'apellido' => ['required'],
        'direccion' => ['required'],
        'celular' => ['required', "numeric"],
        'pass' => ['required'],
        'ruc' => ['required', "numeric"],
        'lat' => ['required'],
        'lon' => ['required'],
      ],
    );

    if ($validator->fails()) {
      return $this->json($this->setErrors($validator->errors()));
    }

    $rpta = $model->save($request->all());

    return $this->json($rpta);
  }

  public function validarCelular(Request $request)
  {
    $model = new ClienteRepo();
    $data = $model->validarCelular($request->input('celular'));

    if (!empty($data)) {
      if ($data->celular == $request->input('celular') && password_verify($request->input('pass'),$data->pass)) {
        $this->result = [
            "nombre"=>$data->nombre,
            "apellido"=>$data->apellido,
            "ruc"=>$data->ruc_dni,
            "direccion"=>$data->direccion,
            "celular"=>$data->celular,
            "pass"=>$data->pass
        ];
        return $this->json($this->setResponse(true, 'Acceso concedido'));
      } else {
        return $this->json($this->setResponse(false, 'Acceso denegado'));
      }
    } else {
      return $this->json($this->setResponse(false, 'Acceso denegado'));
    }
  }

}
