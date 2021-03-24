<?php

use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Router;


$router->group(['namespace' => 'App\Controllers'], function (Router $router) {
  
  $router->get('', ['uses' => 'ClienteController@index']);

  //Cliente
  $router->post('api/cliente', ['uses' => 'ClienteController@store']);
  $router->post('api/cliente/validar', ['uses' => 'ClienteController@validarCelular']);

  //Producto
  $router->get('api/producto/all', ['uses' => 'ProductoController@allProducto']);

  //Pedido
  $router->post('api/pedido', ['uses' => 'PedidoController@store']);

});


$router->any('{any}', function () {
  return 'Error 404';
})->where('any', '(.*)');
