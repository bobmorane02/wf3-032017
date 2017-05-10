<?php

/* 1- Créer une base de données "restaurants" avec une table "restaurant" :
	  id_restaurant PK AI INT(3)
	  nom VARCHAR(100)
	  adresse VARCHAR(255)
	  telephone VARCHAR(10)
	  type ENUM('gastronomique', 'brasserie', 'pizzeria', 'autre')
	  note INT(1)
	  avis TEXT

	2- Créer un formulaire HTML (avec doctype...) afin d'ajouter un restaurant dans la bdd. Les champs type et note sont des menus déroulants que vous créez avec des boucles.
	
	3- Effectuer les vérifications nécessaires :
	   Le champ nom contient 2 caractères minimum
	   Le champ adresse ne doit pas être vide
	   Le téléphone doit contenir 10 chiffres
	   Le type doit être conforme à la liste des types de la bdd
	   La note est un nombre entre 0 et 5
	   L'avis ne doit être vide
	   En cas d'erreur de saisie, afficher des messages d'erreurs au-dessus du formulaire

	4- Ajouter le restaurant à la BDD et afficher un message en cas de succès ou en cas d'échec.

	5- Afficher dans table HTML la liste des restaurants avec les champs nom et telephone, et un champ supplémentaire
	   "Aures infos" avec un lin qui permet d'afficher le détail de chaque contact

	6- Afficher sous la table HTML le détail d'un restaurant quand on clique sur le lien "Autres infos"

*/

// ---------------------------------------------- Traitement -----------------------------------------------
$message = '';
$liste = '';
$detail = '';

$type = array ('gastronomique','brasserie','pizzeria','autre');

$pdo = new PDO('mysql:host=localhost;dbname=restaurants','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

if (!empty($_POST)){

	if (empty($_POST['nom']) || strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 100) {
		$message .= '<div>Nom incorrect ou trop court</div>';
	}

	if (empty($_POST['adresse']) || strlen($_POST['adresse']) > 255) {
		$message .= '<div>Adresse invalide</div>';
	}

	if (empty($_POST['telephone']) || !preg_match('#^[0-9]{10}$#',$_POST['telephone'])) {
		$message .= '<div>Téléphone non valide</div>';
	}

	if (empty($_POST['type']) || !in_array($_POST['type'],$type)) {
		$message .= '<div>Type non valide</div>';
	}

	$_POST['note'] = (int)$_POST['note'];
	if (empty($_POST['note']) || $_POST['note'] < 0 || $_POST['note'] > 5 ) {
		$message .= '<div>Note invalide</div>';
	}

	if (empty($_POST['avis'])) {
		$message .= '<div>Veuillez donner un avis</div>';
	}

	if (empty($message)) {
		foreach ($_POST as $index => $valeur) {
			$_POST[$index] = htmlspecialchars($valeur,ENT_QUOTES); 
		}

		$resultat = $pdo->prepare("INSERT INTO restaurant (nom,adresse,telephone,type,note,avis) VALUES (:nom,:adresse,:telephone,:type,:note,:avis)");
		$resultat->bindParam (':nom',$_POST['nom'],PDO::PARAM_STR);
		$resultat->bindParam (':adresse',$_POST['adresse'],PDO::PARAM_STR);
		$resultat->bindParam (':telephone',$_POST['telephone'],PDO::PARAM_STR);
		$resultat->bindParam (':type',$_POST['type'],PDO::PARAM_STR);
		$resultat->bindParam (':note',$_POST['note'],PDO::PARAM_INT);
		$resultat->bindParam (':avis',$_POST['avis'],PDO::PARAM_STR);
		$succes = $resultat->execute();
		$message .= $succes?'Ajout du restaurant effectué':'Une erreur c\'est produite lors de l\'ajout';
	}

}


$res = $pdo->query("SELECT * FROM restaurant");

	while ($ligne = $res->fetch(PDO::FETCH_ASSOC)) {
		$liste .= '<tr><td>'.$ligne['nom'].'</td><td>'.$ligne['telephone'].'</td><td><a href="?id='.$ligne['id_restaurant'].'">Autres infos</a></td></tr>';
	}

if (!empty($_GET['id'])) {
	$detail = '<h2>Détails</h2><ul>';
	$res = $pdo->query("SELECT * FROM restaurant WHERE id_restaurant='$_GET[id]'");
	$details = $res->fetch(PDO::FETCH_ASSOC);
	foreach ($details as $index => $valeur ) {
		$detail .= '<li>'.$index.' : '.$valeur.'</li>';
	}
	$detail .= '</ul>';
}

// ---------------------------------------------- Affichage  -----------------------------------------------
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
	<h1>Côte  des Restaurants</h1>
	<?php echo $message; ?>
	<form method="post" action="">
		<p></p>
		<div><label for="nom">Nom</label></div>
		<div><input id="nom" type="text" name="nom"></div>
		<p></p>
		<div><label for="adresse">Adresse</label></div>
		<div><input id="adresse" type="text" name="adresse"></div>
		<p></p>
		<div><label for="telephone">Telephone</label></div>
		<div><input id="telephone" type="text" name="telephone"></div>
		<p></p>
		<div><label for="type">Type</label></div>
		<select id="type" name="type">
			<?php
				foreach ($type as $val) {
					echo "<option value=$val>$val</option>";
				}
			?>
		</select>
		<p></p>
		<div><label for="note">Note</label></div>
		<select id="note" name="note">
			<?php
				for ($i=0; $i <= 5; $i++) {
					echo "<option value=$i>$i</option>";
				}
			?>
		</select>
		<p></p>
		<div><label for="avis">Avis</label></div>
		<div><textarea id="avis" name="avis" cols="30" rows="10" value="Votre avis"></textarea></div>
		<p></p>
		<input type="submit" value="Valider">
	</form>
	<h1>Liste des restaurants</h1>
	<table>
		<tr>
			<th>Nom</th>
			<th>Telephone</th>
			<th></th>
		</tr>
		<?php
			echo $liste;
		?>
	</table>
	<div>
		<?php 
			echo $detail;
		?>
	</div>
</body>
</html>