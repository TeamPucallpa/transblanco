<?php 


namespace Core;
use Illuminate\Database\Capsule\Manager as DB;

class Conexion
{

  private static $instance = null;

  public static function getInstance()
  {
    if(self::$instance == null){
      self::$instance = new Conexion();
    }

    return self::$instance;
  }

  public static function conexion()
  {
    try{
      $capsule = new DB();
      $capsule->addConnection([
        'driver'=>DB_CONNECTION,
        'host'=>DB_HOST,
        'database'=>DB_DATABASE,
        'username'=>DB_USERNAME,
        'password'=>DB_PASSWORD,
        'charset'=>'utf8',
        'collation'=>'utf8_unicode_ci',
        'prefix'=>''
      ]);

      $capsule->setAsGlobal();
      $capsule->bootEloquent();
    }catch(\Exception $ex){
      die('Falló la conexion: '. $ex->getMessage());
    }
  }

}












?>