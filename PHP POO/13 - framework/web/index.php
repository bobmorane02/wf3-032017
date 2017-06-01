<?php
    session_start();    # On ouvre une nouvelle session en premier lieu.
    require_once(__DIR__.'/../vendor/autoload.php');

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
    */

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
    $resultat = $er->register($produit);*/
    $resultat = $er->findAll();
    echo '<pre>';print_r($resultat);echo '</pre>';
