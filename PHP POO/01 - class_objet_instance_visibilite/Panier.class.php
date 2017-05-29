<?php

class Panier {              // Déclaration de la classe Panier (avec P majuscule)
    public $nbProduit;      // propriété (variable)



    public function ajouterProduit(){ // méthode
        // traitement de la méthode
        return "l'article a bien été ajouté au panier !";
    }

    protected function retirerProduit (){
        return "l'article a été retirer du panier !";
    }

    private function affichagePanier (){
        return "Voici les produits dans le panier !";
    }
}

// -------------------------------------------------------

$panier = new Panier; // Instanciation. $panier représente un objet de la classe Panier.

echo '<pre>';var_dump($panier);echo '</pre>';
echo '<pre>';var_dump(get_class_methods($panier));echo '</pre>';

$panier->nbProduit = 5;
echo 'Nombre de produits : '.$panier->nbProduit.'<br/>';
echo '<pre>';var_dump($panier);echo '</pre>';

echo 'Panier : '.$panier->ajouterProduit().'<br/>';
// echo 'Panier : '.$panier->retirerProduit().'<br/>'; --> Impossible d'accéder à un élément protected à l'extérieur de la classe
// echo 'Panier : '.$panier->affichagePanier().'<br/>'; --> Impossible d'accéder à un élément private à l'extérieur de la classe

$panier2 = new Panier;
echo '<pre>';var_dump($panier2);echo '</pre>';

/*
    new : est un mot clé qui permet de créer un objet issu d'une classe (instanciation)

    On peut créer plusieurs objets d'une même classe. Et lorsqu'on affecte une valeur à une propriété d'un objet cela n'a pas
    d'incidence sur les autres objets de la classe.

    Niveaux de visibilité :
        - public        : accessible de partout
        - protected     : accessible depuis la classe où l'élément à été déclaré ainsi que depuis les classes héritiéres.
        - private       : accessible UNIQUEMENT depuis la classe où l'élément à été déclaré.
*/