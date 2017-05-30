<?php

class Membre {
    public $id_membre;
    public $pseudo;
    public $email;

    public function inscription () {
        return "Je m'inscris !";
    }

    public function connexion(){
        return "Je me connecte !";
    }
}

// ---------------------------

class Admin  extends Membre {   // extends signifie "hérite de "
    // tout le code de Membre est ici !!!

    public function accesBackOffice() {
        return "J'ai accès au backOffice";
    }
}

// ---------------------------

$admin = new Admin;
echo $admin->inscription().'<br>';
echo $admin->connexion().'<br>';
echo $admin->accesBackOffice().'<br>';

/*
    Dans notre site, un Admin est avant tout un membre, avec quelques fonctionnalités supplémentaires 
    (acces backoffice, suppression de membre etc ...)
    Il est donc naturel que la classe Admin soit héritière (extends) de la classe Membre et qu'on ne 
    ré-écrive pas tout les code.
*/