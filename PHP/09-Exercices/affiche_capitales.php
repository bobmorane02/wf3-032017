<?php
/* 
   Vous créez un tableau PHP contenant les pays suivants : France, Italie, Espagne, inconnu, Allemagne auxquels vous associez les valeurs Paris, Rome, Madrid, blablabla, Berlin.

   Vous parcourez ce tableau pour afficher la phrase "La capitale X se situe en Y" dans un paragraphe (où X remplace la capitale et Y le pays).

   Pour le pays "inconnu" vous afficherez "Ca n'existe pas !" à la place de la phrase précédente. 	


*/

// ---------------------------------- traitement ---------------------------------------
$message ='';

$capitales = array ('France'=>'Paris','Italie'=>'Rome','Espagne'=>'Madrid','inconnu'=>'blablabla','Allemage'=>'Berlin');

foreach ($capitales as $pays => $capitale) {
    $message .= ($pays == 'inconnu')?"<p>Ca n'existe pas !</p>":"<p>La capitale $capitale se situe en $pays</p>";
}

// ---------------------------------- affichage  ---------------------------------------
echo $message;