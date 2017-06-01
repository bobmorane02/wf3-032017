<?php

namespace Controller;

use Controller\Controller;

class ProduitController extends Controller
{
    public function afficheAll(){
        $produits = $this->getRepository()->getAllProduits();
        $categories = $this->getRepository()->getAllCategories();
        # $this->render();

        $params = array(
            'produits'      => $produits,
            'categories'    => $categories,
            'title'         => 'Ma Boutique'
        );

        return $this->render('layout.html','boutique.html',$params);
    }

    public function affiche($id){
        $produit = $this->getRepository()->getProduitById($id);
        $suggestions = $this->getRepository()->getAllSuggestions($produit['categorie'],$produit['id_produit']);
        # $this->render();
        require(__DIR__.'/../View/Produit/fiche_produit.php');        
    }

    public function categorie($categorie){
        $produits = $this->getRepository()->getAllProduitsByCategorie($categorie);
        $categories = $this->getRepository()->getAllCategories();
        # $this->render();
        require(__DIR__.'/../View/Produit/categorie.php');        
    }

}