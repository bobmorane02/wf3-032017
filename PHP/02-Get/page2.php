<h1>Page détail des article</h1>

<?php
// ********************************************
// La super globale $_GET
// ********************************************
//  $_GET représente l'URL : il s'agit d'une superglobale, et comme toutes les superglobales,
// d'un ARRAY. Superglobale signifie qu'il est disponible dans tous les contextes du script,
// y compris dans les fonctions : il n'est pas nécessaire de global $_GET

// Les informations transitent dans l'url de la maniére suivante :
// page.php?indice1=valeur1&indice2=valeur2&indice3... (sans espaces)
// Chaque indice de cette URL correspondent à un indice de l'array $_GET, et chaque valeur
//  aux valeurs correspondantes aux indices.


// print_r($_GET);echo '<br>';

if (isset($_GET['article']) && isset($_GET['couleur']) && isset($_GET['prix'])){
// s'ils existent les indices article, couleur et prix, on peut les afficher
    echo 'Article : '.$_GET['article'].'<br>';
    echo 'Couleur : '.$_GET['couleur'].'<br>';
    echo 'Prix    : '.$_GET['prix'].'<br>';
} else {
    echo 'Aucun produit sélectionné';
}