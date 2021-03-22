<?php

#Hora local
date_default_timezone_set("America/Lima");

/* Base URL */
$base_url = '';
$base_folder = strtolower(str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']));

if(isset($_SERVER['HTTP_HOST']))
{
  $base_url  = isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off' ? 'https' : 'http';
  $base_url .= '://'.$_SERVER['HTTP_HOST'];
  $base_url .= $base_folder;
}


//Variable base
define('_BASE_HTTP_', $base_url);
define('_NOMBRE_APP_','');
define('_CURRENT_URL',str_replace($base_folder,'',$_SERVER['REQUEST_URI']));
define('DB_CONNECTION', 'mysql');
define('DB_HOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'db_transblanco');