<?php
/* 
	1- Vous réalisez un formulaire "Votre devis de travaux" qui permet de saisir le montant des travaux de votre maison en HT et de choisir la date de construction de votre maison (bouton radio) : "plus de 5 ans" ou "5 ans ou moins". Ce formulaire permettra de calculer le montant TTC de vos travaux selon la période de construction de votre maison.

	2- Vous réalisez la validation du formulaire : le montant doit être en nombre positif non nul, et la période de construction conforme aux valeurs que vous aurez choisies.

	3- Vous créez une fonction montantTTC qui calcule le montant TTC à partir du montant HT donné par l'internaute et selon la période de construction : le taux de TVA est de 10% pour plus de 5 ans, et de 20% pour 5 ans ou moins. La fonction retourne le résultat du calcul.
	
	Formule de calcul d'un montant TTC :  montant TTC = montant HT * (1 + taux / 100) où taux est par exemple égale à 20.

	4- Vous affichez le résultat calculé par la fonction au-dessus du formulaire : "Le montant de vos travaux est de X euros avec une TVA à Y% incluse."

	5- Vous diffusez des codes de remises promotionnelles, dont un est 'abc' offrant 10% de remise. Ajoutez un champ au formulaire pour saisir le code de remise. Vous validez ce champ qui ne doit pas excéder 5 caractères. Puis la fonction montantTTC applique la remise (-10%) au montant total des travaux si le code de l'internaute est correcte. Vous affichez dans ce cas "Le montant de vos travaux est de X euros avec une TVA à Y% incluse, et y compris une remise de 10%.". 

*/

// --------------------------------------------- Traitement -----------------------------------------
$message = '';
$remise = false;

function montantTTC ($montant,$periode,$rem) {
	$taxe = ($periode == "moins")?20:10;
	$totalTTC = $montant*(1+$taxe/100);
	if ($rem) {
		$totalTTC *= 0.9; 
	}
	$retour = array('montant'=>$totalTTC,'taux'=>$taxe,'remise'=>$rem);
	return $retour;
}

if (!empty($_POST)) {
	$_POST['montant'] = (int)$_POST['montant'];

	if ($_POST['montant'] <= 0) {
		$message .= '<p>Le montant de vos travaux est incorrect</p>';
	}

	if ($_POST['dateC'] != 'moins' && $_POST['dateC'] != 'plus') {
		$message .= '<p>La date de construction est incorrecte</p>';
	}

	if (!empty($_POST['remise']) && $_POST['remise'] != 'abc' ) {
		$message .= '<p>Votre coupon de remise n\'est pas valide</p>';

	} elseif (!empty($_POST['remise']) && $_POST['remise'] == 'abc'){
		$remise = true;
	}

	if (empty($message)) {
		$ret = montantTTC ($_POST['montant'],$_POST['dateC'],$remise);
		if (!$ret['remise']) {
			$message .= '<p>Le montant de vos travaux est de '.$ret['montant'].' euros avec une TVA à '.$ret['taux'].'% incluse.</p>';
		} else {
			$message .= '<p>Le montant de vos travaux est de '.$ret['montant'].' euros avec une TVA à '.$ret['taux'].'% incluse, et y compris une remise de 10%.</p>';
		}

	}
}

// -------------------------------------------- Affichage  ------------------------------------------
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
	<h1>Votre devis de travaux</h1>
	<?php echo $message; ?>
	<form method="post" action="">
		<div><label for="montant">Montant des Travaux HT</label></div>
		<input  id="montant" type="text" name="montant">
		<p></p>
		<div>Date de construction</div>
		<div><input type="radio" name="dateC" value="moins" checked>5 ans ou moins</div>
		<div><input type="radio" name="dateC" value="plus">plus de 5 ans</div>
		<div>Votre code de remise<input name="remise" type="text"></div>
		<p><input type="submit" value="Valider"></p>
	</form>
</body>
</html>
