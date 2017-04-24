<h1>Couleur du fruit</h1>
<?php

// Exercice :
/*
    - Dans le fichier listeFruits.php : créer 3 liens Banane, Kiwi, et Cerise. Quand on clique
      sur les liens, on passe le nom du fruit dans l'URL à la page couleur.php.

    - Dans couleur.php : recuperer le nom du fruit et afficher sa couleur.

    Notez que vous ne passez pas la couleur dans l'URL mais vous la déduisez dans couleur.php.
*/

if(isset($_GET['fruit'])){
    switch ($_GET['fruit']){
        case 'banane' : echo 'La Banane est jaune';break;
        case 'kiwi' : echo 'Le Kiwi est vert';break;
        case 'cerise' : echo 'La Cerise est rouge';break;
        default :  echo "Ce fruit n'existe pas";  
    }
} else {
    echo 'Pas de fruit choisi';
}
