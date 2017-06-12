<?php


namespace Controller;

use Entity\User;

class UserController extends ControllerAbstract{
    
    public function registerAction(){
        
        $user = new User;
        
        if (!empty($_POST)){
            $user->setLastname($_POST['lastname'])
                 ->setFirstname($_POST['firstname'])
                 ->setEmail($_POST['email'])
                 ->setPassword($this->app['user.manager']->encodePassword($_POST['password']))
            ;
            
            $this->app['user.repository']->insert($user);
        }
        
        return $this->render('register.html.twig');
    }
}
