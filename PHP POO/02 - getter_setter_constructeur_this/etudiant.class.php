<?php

class Etudiant {
    private $prenom;

    public function __construct($arg = NULL){
        $this->setPrenom($arg);
    }

    public function setPrenom ($prenom) {
        $this->prenom = $prenom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

}

// ----------------------------------
$etudiant = new Etudiant('Robert');
echo 'Prenom : '.$etudiant->getPrenom();

// Exercice : Essayez d'affecter une valeur à prénom en modifiant UNIQUEMENT l'intérieur de la classe.