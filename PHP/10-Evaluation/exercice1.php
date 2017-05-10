<?php
// -------------------------------------------- Traitement ------------------------------------------------
$message ='<ul>';   // Initialisation de la variable d'affichage'

$fiche = array('prenom'=>'Robert',                              // Création de l'array demandé
               'nom'=>'KOWALCZYK',
               'adresse'=>'211 boulevard Gambetta',
               'code_postal'=>'02700',
               'ville'=>'CONDREN',
               'email'=>'robert.kowalczyk@sfr.fr',
               'telephone'=>'0601754385',
               'date_de_naissance'=>'1963-04-22');

foreach ($fiche as $index => $valeur) {     // Boucle de parcourt des indices/valeurs de l'array précédent
    if ($index == 'date_de_naissance') {    // Si l'indice vaut 'date_de_naissance' alors convertir la valeur
        $dn = new DateTime ($valeur);       // au format JJ-MM-AAAA à l'aide d'un objet de classe DateTime
        $valeur = $dn->format ('d-m-Y');
    }
    $message .= "<li>$index : $valeur</li>";    // Stockage dans la variable d'affichage
}

$message .= '</ul>';










// -------------------------------------------- Affichage  ------------------------------------------------
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php echo $message; ?> <!-- Affichage de la variable d'affichage -->
</body>
</html>