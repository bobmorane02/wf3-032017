<?php

namespace Controller;

use Repository;

class Controller
{
    protected $repository;  # Contiendra un objet de ProduitRepository ou MembreRepository ou CommandeRepository etc ...
                            # en fonction de l'entité dans laquelle de suis (produitController,ou MembreController ou
                            # CommendeController ...)

    public function getRepository(){    # exemple: je suis dans Controller\ProduitController, et je veux un 
                                        #          Repository\ProduitRepository 
        $class = 'Repository\\'.str_replace(array('Controller\\','Controller'),'',get_called_class()).'Repository';
        # Controller\ProduitController
        $this->repository = new $class;
        return $this->repository;
    }

    public function render($layout,$view,$params){
        $dirView = __DIR__.'/../../src/View'; # On va dans le dossier View
        $dirFile = str_replace(array('Controller\\','Controller'),'',get_called_class()); # On récupére le mot 'Produit'

        $path_layout = $dirView.'/'.$layout;
        $path_view = $dirView.'/'.$dirFile.'/'.$view;

        extract($params);

        ob_start(); # enclenche la temporisation de sortie. Cela signifie que la ligne de code suivante ne sera pas 
                    # executée de suite.
        require $path_view;
		
		$content = ob_get_clean(); # cela signifie que l'action retenue en temporisation, est maintenant représentée 
                                   # par la variable $content. 
		
		ob_start();
		require $path_layout;
		
		return ob_end_flush();     # retourne tout ce qui a été retenu. Il éteint la temporisation !		
    }
}