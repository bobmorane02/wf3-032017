<?php
require_once '../App/autoload.php';

use Lib\Router;

$router = Router::getInstance();
$router->setPrefix('/MVC/web/')
         ->addRoute('home','utilisateurs','user','list')->run();
         