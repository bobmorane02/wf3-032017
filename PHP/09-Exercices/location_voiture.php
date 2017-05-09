<?php
/*
   1- Vous créez un formulaire avec un menu déroulant avec les catégories A,B,C et D de véhicules de location et un champ nombre de jours de location. Lorsque le formulaire est soumis, vous affichez "La location de votre véhicule sera de X euros pour Y jour(s)." sous le formulaire.

   2- Vous validez le formulaire : la catégorie doit être correcte et le nombre de jours un entier positif.

   3- Vous créez une fonction prixLoc qui retourne le prix total de la location en fonction du prix de la catégorie choisie (A : 30€, B : 50€, C : 70€, D : 90€) multiplié par le nombre de jours de location. 

   4- Si le prix de la location est supérieur à 150€, vous consentez une remise de 10%.

*/

// -------------------------------------------- Traitement ----------------------------------------------
$message = '';
$cat = array('A','B','C','D');

function prixLoc ($nb_jours,$cat) {
    switch ($cat) {
            case 'A' : $total = $nb_jours*30;break;
            case 'B' : $total = $nb_jours*50;break;
            case 'C' : $total = $nb_jours*70;break;
            default  : $total = $nb_jours*90;
    }

    if ($total > 150) {
        $total = $total - ($total*10)/100;
    }
    return $total;
}

if (!empty($_POST)) {
    $jours = intval($_POST['nbj']); // Ou alors faire un cast : (int)$_POST['nbj'].

    if ( !in_array($_POST['categorie'],$cat)) {
        $message .= nl2br("Catégorie invalide\n");
    }

    if ( $jours <= 0 ) {
        $message .= 'Nombres de jours invalide';
    }

    if (empty($message)) {
        $prix = prixLoc($jours,$_POST['categorie']);
        $message .= "La location de votre véhicule sera de $prix euros pour $jours jour(s).";
    }

} else {
    $message .= 'Veuillez remplir le formulaire';
}


// -------------------------------------------- Affichage  ----------------------------------------------
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
    <h1>Location de véhicule</h1>
    <form method="post" action="">
        <p>
            <label for="categorie">Catégorie de Véhicule</label>
            <select name="categorie" id="categorie">
                <?php
                    foreach ($cat as $valeur) {
                        echo "<option value=$valeur>$valeur</option>";
                    }
                ?>
            </select>
        </p>
        <p>
            <label for="nbj">Nombre de jours</label>
            <input type="text" id="nbj" name="nbj" value="1">
        </p>
        <p>
            <input type="submit" value="Valider">
        </p>
    </form>
    <div><?php echo $message; ?></div>
</body>
</html>