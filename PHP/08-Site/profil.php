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

// Exercice :
/*
    1- Afficher le suivi des commandes du membre (s'il y en a) dans une liste <ul><li>
       id_commande, date et état de la commande. S'il n'y en à pas, on affiche "Aucune commande en cours"

    2- 

*/
$id_membre = $_SESSION['membre']['id_membre'];
$commande_en_court = executeRequete("SELECT id_commande,DATE_FORMAT(date_enregistrement,'%d-%m-%Y') AS date_commande,etat FROM commande WHERE id_membre = '$id_membre'");
// dans une requête SQL, on met les variables entre quotes. Pour mémoire, si on y met un array, celui-ci perd ses quotes autour de l'indice. A savoir : on ne peut pas le 
// faire avec un array multidimensionnel

if ($commande_en_court->rowCount()) {
    while ($resultat = $commande_en_court->fetch(PDO::FETCH_ASSOC)) {
            $contenu .= '<ul class="col-xs-4 list-unstyled" style="float:none;padding-left:0px;">
                            <li class="bg-info">N° de commande : '.$resultat['id_commande'].'</li>
                            <li>Date de commande : '.$resultat['date_commande'].'</li>
                            <li>Etat de commande : '.$resultat['etat'].'</li>
                        </ul>';
    }  
} else {
    $contenu .= '<div class="col-xs-4 bg-info" style="float:none;padding-left:0px;">Aucune commande en cours</div>';
}
// --------------------------------------------  AFFICHAGE --------------------------------------------
require_once('inc/haut.inc.php');
echo $contenu;
require_once('inc/bas.inc.php');