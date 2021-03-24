<?php

namespace App\Controllers;

use Illuminate\Http\Request;
use Core\Template;
use App\Repositories\PedidoRepo;
use Core\Validation;
use App\Helpers\Response;

class PedidoController extends Template
{

  use Validation, Response;

  public function __construct()
  {
    parent::__construct();
  }


  public function store(Request $request)
  {
    $model = new PedidoRepo();

    $validator = $this->validar(
      $request->all(),
      [
        'cliente' => ['required'],
        'fecha' => ['required'],
        'tipo_pago' => ['required'],
        'total' => ['required'],
        'subtotal' => ['required'],
        'impuesto' => ['required'],
        'descuento' => ['required']
      ],
    );

    if ($validator->fails()) {
      return $this->json($this->setErrors($validator->errors()));
    }

    $rpta = $model->save($request->all());

    return $this->json($rpta);
  }

 

}
