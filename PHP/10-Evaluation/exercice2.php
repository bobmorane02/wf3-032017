<?php
// -------------------------------------------- Traitement ------------------------------------------------
$message ='';   // Initialisation de la variable d'affichage'

function convertDevise ($montant,$devise) {     // fonction de convertion euro/dollar
    
    if ($devise == 'euro') {    // si la devise fourni est l'euro
        $resultat = $montant * 1.08596; 
        $retour = array('resultat'=>$resultat,'devise'=>'dollars americains'); // on crée un tableau de retour
    } else {
        $resultat = $montant / 1.08596; // si la devise fourni est le dollar
        $retour = array('resultat'=>$resultat,'devise'=>'euro'); // on crée un tableau de retour
    }
    return $retour; // On renvoit le tableau de retour
}

if (!empty($_GET)) {    // si la superglobale $_GET est non vide 

    if (!is_numeric($_GET['montant']) || $_GET['montant'] <= 0 || empty($_GET['montant'])) { // Si le montant n'est pas une valeur numérique ou que le montant est inférieur
        $message .= 'Le montant renseigné n\'est pas valide !';                              // ou égal à 0 ou vide on affiche le message d'erreur
    }

    if (empty($_GET['devise']) || ($_GET['devise'] != 'euro' && $_GET['devise'] != 'USD')) { // Si la devise est vide ou ne correspond pas au deux valeurs attendues (euro,USD)
        $message .= 'La devise demandée n\'est pas gérée !';                                 // on affiche le message d'erreur
    }

    if (empty($message)) {  // Si la variable $message est vide (pas d'erreur) alors ...
        $reponse = convertDevise($_GET['montant'],$_GET['devise']); // on appel la fonction convertDevise et on stock le résultat dans $reponse
        $reponse_devise = ($_GET['devise'] == 'USD')?'dollars américains':'euro';   // On crée une variable pour l'affichage des devises
        $message .= $_GET['montant'].' '.$reponse_devise.' = '.$reponse['resultat'].' '.$reponse['devise']; // On rempli la variable d'affichage
    }

}

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
    <h1>Convertisseur Euro/US Dollar </h1>
    <p></p>
    <form method="get" action="?montant=montant&devise=devise">
        <p>Montant à convertir : <input name="montant" type="text"></p>
        <div>Devise</div>
        <div><input type="radio" name="devise" value="euro" checked> Euro</div>
        <div><input type="radio" name="devise" value="USD"> US Dollar</div>
        <p><input type="submit" value="Convertir"></p>       
    </form>
    <p><?php echo $message; ?></p>  <!-- On affiche le resultat -->
</body>
</html>