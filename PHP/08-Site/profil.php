<?php
require_once('inc/init.inc.php');

// -------------------------------------------- TRAITEMENT --------------------------------------------
// Si visiteur non connecté, on l'envoie vers connexion.php
if (!internauteEstConnecte()) {
    header('location:connexion.php'); // Nous l'invitons à se connecter
    exit();
}

if ($_SESSION['membre']['statut']) {
    $contenu .= '<p>Vous êtes administrateur</p>';
} else {
    $contenu .= '<p>Vous êtes membre</p>';
}

$contenu .= '<h2>Bonjour '.$_SESSION['membre']['pseudo'].'</h2>';
$contenu .= '<div><h3>Vos informations de profil</h3>';
    $contenu .= '<p>Votre email : '.$_SESSION['membre']['email'].'</p>';
    $contenu .= '<p>Votre adresse : '.$_SESSION['membre']['adresse'].'</p>';
    $contenu .= '<p>Votre CP : '.$_SESSION['membre']['code_postal'].'</p>';
    $contenu .= '<p>Votre ville : '.$_SESSION['membre']['ville'].'</p>';
$contenu .= '</div>';


// --------------------------------------------  AFFICHAGE --------------------------------------------
require_once('inc/haut.inc.php');
echo $contenu;
require_once('inc/bas.inc.php');