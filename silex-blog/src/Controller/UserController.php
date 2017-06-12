<?php


namespace Controller;

use Entity\User;
use Symfony\Component\Validator\Constraints as Assert;

class UserController extends ControllerAbstract{
    
    public function registerAction(){
        
        $user = new User;
        $errors = [];
        
        if (!empty($_POST)){
            
            // Validation 
            
            $user->setLastname($_POST['lastname'])
                 ->setFirstname($_POST['firstname'])
                 ->setEmail($_POST['email'])
                 ->setPassword($this->app['user.manager']->encodePassword($_POST['password']))
            ;
            
            $this->app['user.repository']->insert($user);
            $this->app['user.manager']->login($user);
            
            return $this->redirectRoute('homepage');
        }
        
        return $this->render('register.html.twig');
    }
    
    public function loginAction(){
        
        $email ='';
        
        if(!empty($_POST)){ 
            $email = $_POST['email'];
            
            $user = $this->app['user.repository']->findByEmail($email);
            
            if (!is_null($user)){ # S'il y a un utilisateur den BDD avec cet email
                                  # si le MDP saisie est celui de l'utilisateur
                
                if ($this->app['user.manager']->verifyPassword($_POST['password'],$user->getPassword())){
                    $this->app['user.manager']->login($user);
                    return $this->redirectRoute('homepage');
                } 
            }
            
            $this->addFlashMessage('Identification incorrecte','error');
        }
        
        return $this->render('login.html.twig',
                ['email' => $email]);
    }
    
    public function logoutAction(){
        
        $this->app['user.manager']->logout();
        return $this->redirectRoute('homepage');
        
    }
}
