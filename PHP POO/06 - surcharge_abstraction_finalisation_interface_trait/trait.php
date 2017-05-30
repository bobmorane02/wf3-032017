<?php

// Attention : Les traits ne fonctionnent que depuis PHP 5.4

trait TPanier {
    public $nbProduit = 1;

    public function affichageProduit(){
        return 'affichage des produits dans le panier';
    }
}

// ---------------------------------

trait TMembre {
    public function affichageMembre(){
        return 'Affichage des membres';
    }
}

// ---------------------------------

class Site {
    use TPanier,TMembre;
    // use permet d'importer les code contenu dans un ou plusieurs traits.
}

// ---------------------------------

$site = new Site;
echo $site-> affichageProduit().'<br>';
echo $site-> affichageMembre().'<br>';

/*
    - Les trits permettent d'importer du code dans une classe.
    - Ils ont été inventés pour repousser l'héritage non multiple.
    - Une classe peut impoter plusieurs traits.
    - Un trait peut impoter un trait.
*/