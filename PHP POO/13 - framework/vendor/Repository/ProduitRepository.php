<?php

namespace Repository;

use Manager\EntityRepository;   # ! Trés important car l'héritier (ProduitRepository) se 
                                # trouve dans un autre namespace que la classe dont il 
                                # hérite (EntityRepository)
use PDO;

class ProduitRepository extends EntityRepository
{
    # Le code de EntityRepository se trouve ici ...

    # On renomme les requêtes existantes dans EntityRepository pour plus de lisibilité (pas obligatoire)
    public function getAllProduits(){
        return $this->findAll();
    }

    public function getProduitById($id){
        return $this->find($id);
    }

    public function deleteProduitById($id){
        return $this->delete($id);
    }

    public function registerProduit($info){
        return $this->register($info);
    }

    # requêtes spécifiques à cette entité Produit :

    public function getAllCategories(){
        $requete = "SELECT DISTINCT categorie FROM produit";
        $resultat = $this->getDb()->query($requete);

        $categories = $resultat->fetchAll(PDO::FETCH_ASSOC);

        if (!$categories){
            return FALSE;
        } else {
            return $categories;
        }
    }

    public function getAllProduitsByCategorie($categorie){
        $requete = "SELECT * FROM produit WHERE categorie = :categorie";
        $resultat = $this->getDb()->prepare($requete);
        $resultat->bindParam(':categorie',$categorie,PDO::PARAM_STR);
        $resultat->execute();

        $produits = $resultat->fetchAll(PDO::FETCH_ASSOC);

        if (!$produits){
            return FALSE;
        } else {
            return $produits;
        }
    }

    public function getAllSuggestions($categorie,$id){
        $requete= "SELECT * FROM produit WHERE categorie = '$categorie' AND id_produit != '$id'";
        $resultat = $this->getDb()->query($requete);
        $suggestions = $resultat->fetchAll(PDO::FETCH_ASSOC);

        if (!$suggestions){
            return FALSE;
        } else {
            return $suggestions;
        }        
    }

}