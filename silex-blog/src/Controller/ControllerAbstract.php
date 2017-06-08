<?php

namespace Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Twig_Environment;

class ControllerAbstract {
    
    /**
     *
     * @var Application
     */
    protected $app;

    /**
     *
     * @var Session
     */
    protected $session;
    /**
     *
     * @var Twig_Environment
     */
    protected $twig;
    
    public function __construct(Application $app){
        $this->app = $app;
        $this->twig = $app['twig'];
        $this->session = $app['session'];
    }
    
    /**
     * 
     * Affiche une vue
     * 
     * @param string $view
     * @param array $parameters
     * @return string
     */
    public function render($view,$parameters = []){
        return $this->twig->render($view, $parameters);
    }
    
    public function addFlashMessage($message,$type = 'success'){
        $this->session->getFlashBag()->add($type, $message);
    }
    
    /**
     * 
     * redirige vers une autre page en lui passant le nom de la route
     * 
     * @param type $routeName
     * @param array $parameters
     * @return Response
     */
    public function redirectRoute($routeName, array $parameters = []){
        return $this->app->redirect(
                $this->app['url_generator']->generate($routeName,$parameters));
    }
}
