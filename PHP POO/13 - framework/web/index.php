<?php
    session_start();    # On ouvre une nouvelle session en premier lieu.
    require_once(__DIR__.'/../vendor/autoload.php');

    /* TEST 1 : Entity Produit
    $produit = new Entity\Produit;
    $produit->setTitre('Mon produit');
    echo $produit->getTitre();
    */

    # TEST 2 : PDOManager
    $pdom = Manager\PDOManager::getInstance();
    $resultat = $pdom->getPdo()->query('SELECT * FROM produit');
    $produits = $resultat->fetchAll(PDO::FETCH_ASSOC);
    echo '<pre>';print_r($produits);echo '</pre>';