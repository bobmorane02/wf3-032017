<?php

namespace Controller;

use Silex\Application;

class FirstController {
    
    /**
     * Il suffit de demander une instance de Silex\Application en
     * paramètre de la méthode pour y avois accès
     * 
     * @param Application $app
     */
    public function testAction(Application $app){
        return $app['twig']->render('hello.html.twig');
    }
    
    public function testParamAction(Application $app,$name){
        return $app['twig']->render(
                'hello_world.html.twig',
                ['name' => $name]
                );
    }
    
    public function usersAction(Application $app){
        /**
         * @var Doctrine\DBAL Description
         */
        $db = $app['db'];
        
        /**
         * equivaut à faire query() puis fetchAll() avec PDO
         */
        $users = $db->fetchAll('SELECT * FROM user');
        return $app['twig']->render(
                'users.html.twig',
                ['users' => $users]
                );
        
    }

}
