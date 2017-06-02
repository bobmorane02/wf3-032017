<?php
require_once '../App/autoload.php';

use Lib\Router;
use Lib\viewRenderer;

$viewRenderer = viewRenderer::getInstance();
$viewRenderer->setViewDir('../view/')
             ->setLayoutPath('../view/layout.view.php');

$router = Router::getInstance();
$router->setPrefix('/MVC/web/')
         ->addRoute('home','utilisateurs','user','list')
         ->addRoute('user_edit','utilisateurs/edition','user','edit')
         ->run();
         