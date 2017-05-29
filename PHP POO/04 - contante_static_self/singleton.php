<?php

/*
    Design Pattern : Littéralement "patron de conception", est une réponse donnée à un probléme que rencontre plusieurs (tous)
    développeurs.

    le singleton est la réponse à la question : comment créer une classe instanciable qu'une seule et unique fois.
*/

class Singleton {
    private static $instance = NULL;
    private function __construct(){} // la classe n'est plus instantiable car private

    private function __clone(){}     // la classe n'est pas clonable

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new Singleton; //Je mets dans la propriété $instance un objet de la classe self/Singleton (self::$instance = new self)
        }
        return self::$instance;
    }
}

// $singleton = new Singleton; // IMPOSSIBLE d'instancier notre classe
$objet = Singleton::getInstance(); // $objet est le seul et unique objet de cette classe Singleton !!!
$objet2 = Singleton::getInstance();

echo '<pre>';var_dump($objet);var_dump($objet2);echo '</pre>';

// le Singleton est notamment utilisé pour la connexion à la base de données, cela est plus sûr ! 