<?php

class Societe {

    public $adresse;
    public $ville;
    public $cp;

    public function __construct(){}

    public function __set($nom,$valeur){ // s'éxécute au moment où on essaie d'affecter une valeur à une propriété qui n'existe pas.
        echo '<p style="color:white; background: red; padding:5px">Désolé mais la propriété '.$nom.' n\'existe pas dans cette classe ! Donc la valeur<strong> '.$valeur.' </strong>n\'a pas pu étre affectée !</p>';
    }
    /*
        __call() = quand j'appel une méthode qui n'existe pas.
        __callstatic() = quand j'appel une méthode static qui n'existe pas.
        __isset() = quand on fait une condition isset ou empty sur une propriété de l'objet
        __destruct() = s'éxecute quand le script est terminé
        __toString() = se lance quand on essai de faire un echo sur un objet
        __wakeup(), __sleep(), __invoke(), __clone() ...
    */
}

#---------------------------------------

$societe = new Societe;
echo '<pre>';var_dump($societe);echo '</pre>';

$societe->pays = 'France';
echo '<pre>';var_dump($societe);echo '</pre>';