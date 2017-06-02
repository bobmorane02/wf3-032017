<?php
    session_start();    # On ouvre une nouvelle session en premier lieu.
    require_once(__DIR__.'/../vendor/autoload.php');

    /*
    if(isset($_GET['controller']) && !empty($_GET['controller']) && isset($_GET['action']) && !empty($_GET['action'])){
        $controller = 'Controller\\'.ucfirst($_GET['controller']).'Controller';
        if(file_exists(__DIR__.'/../src/Controller/'.ucfirst($_GET['controller']).'Controller.php')){
            $a = new $controller;
            $action = strtolower($_GET['action']);
            if (method_exists($a,$action)){
                if(isset($_GET['id'])){
                    $id = (int)$_GET['id'];
                    $a->$action($id);
                } elseif(isset($_GET['categorie'])) {
                    $cat = (string)$_GET['categorie'];
                    $a->$action($cat);
                } else {
                    $a->$action();
                }
            }
        }
    } else {
        $a = new \Controller\ProduitController;
        $a->afficheAll();
    }

    Les deux lignes suivantes remplaces le code procédural précédant.
    */
    
    $app = new Manager\Application; 
    $app -> run(); 

    /* TEST 1 : Entity Produit
    $produit = new Entity\Produit;
    $produit->setTitre('Mon produit');
    echo $produit->getTitre();
    */

    /* TEST 2 : PDOManager
    $pdom = Manager\PDOManager::getInstance();
    $resultat = $pdom->getPdo()->query('SELECT * FROM produit');
    $produits = $resultat->fetchAll(PDO::FETCH_ASSOC);
    echo '<pre>';print_r($produits);echo '</pre>';

    TEST 3 : EntityRepository    
    $er =new \Manager\EntityRepository;

    /*$produit = array(
            "id_produit" => NULL,
            "reference" => "pull1",
            "categorie" => "vêtement",
            "titre" => "pull homme blanc",
            "description" => "pull homme blanc",
            "couleur" => "blanc",
            "taille" => "L",
            "public" => "m",
            "photo" => "/PHP/08-site/photo/pull1_pull2.jpg",
            "prix" => "49",
            "stock" => "5"
    );
    $resultat = $er->register($produit);
    $resultat = $er->findAll();

    TEST 4 : ProduitRepository

    $pr = new Repository\ProduitRepository;

    $produits = $pr->getAllProduits();
    #$produits = $pr->getProduitById(10);
    #$produits = $pr->deleteProduitById(18);
    #$produits = $pr->getAllProduitsByCategorie('informatique');
    #$produits = $pr->getAllCategories();
    #$produits = $pr->getAllSuggestions('informatique',15);

    echo '<pre>';print_r($produits);echo '</pre>';

    TEST 5 : ProduitController*/

    #$pc = new \Controller\ProduitController;
    #$pc->afficheAll();
    #$pc->affiche(15);
    #$pc->categorie('informatique');
