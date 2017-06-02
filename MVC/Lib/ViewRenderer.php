<?php

namespace Lib;

/**
 * Description of viewRenderer
 *
 * @author Etudiant
 */
class ViewRenderer {
     /**
     *
     * @var viewRenderer
     */
    private static $instance = NULL;
    
    private $viewDir;
    private $layoutPath;

    private function __construct(){}
    private function __clone(){}

    /**
     * 
     * @return viewrenderer
     */
    public static function getInstance(){
        if(is_null(self::$instance)){
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function render($view,$parameters = [])
    {
        extract($parameters);
        
        include $this->viewDir.$view;
    }
    
    public function getViewDir()
    {
        return $this->viewDir;
    }

    public function getLayoutPath()
    {
        return $this->layoutPath;
    }

    public function setViewDir($viewDir)
    {
        $this->viewDir = $viewDir;
        return $this;
    }

    public function setLayoutPath($layoutPath)
    {
        $this->layoutPath = $layoutPath;
        return $this;
    }

}
