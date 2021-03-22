<?php
namespace Core;

Class Template{
 protected $provider;
 public function __construct()
  {
    $loader = new \Twig\Loader\FilesystemLoader(_BASE_PATH_.'/resources/views/');
    
    
    $this->provider = new \Twig\Environment($loader,array(
          'cache' => false,
          'debug' => false
    ));

    $this->provider->addExtension(new \Twig\Extension\DebugExtension());

    $this->addCumtomFilters();

  }

  private function addCumtomFilters(){
    $this->provider->addFunction(new \Twig\TwigFunction('urlBase',function(string $url = ''){
      return _BASE_HTTP_ . $url;
    }));
  }

  public function render(string $view,array $data = []):string{
    return $this->provider->render($view,$data);
  } 
}