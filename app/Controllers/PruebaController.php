<?php 
namespace App\Controllers;
use Illuminate\Http\Request;
use Core\Template;

class PruebaController extends Template{

  public function __construct()
  {
    parent::__construct();
  }

  public function index(Request $request)
  {
    return $this->render("cliente/index.twig");
  }
}