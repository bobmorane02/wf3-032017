<?php
/*
	1- Afficher dans une table HTML la liste des contacts avec les champs nom, prénom, téléphone, et un champ supplémentaire "autres infos" avec un lien qui permet d'afficher le détail de chaque contact.

	2- Afficher sous la table HTML le détail d'un contact quand on clique sur le lien "autres infos".



*/
$ligne = '';

$pdo = new PDO('mysql:host=localhost;dbname=contacts','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$r = $pdo->prepare("SELECT * FROM contact");
if ($r->execute()) {
	$valeurs = $r->fetchall(PDO::FETCH_ASSOC);
}

if (!empty($_GET)){
		foreach ($valeurs[$_GET['contact']] as $index => $valeur) {
			$ligne .= '<li>'.$index.' : '.$valeur.'</li>';
		}	
}
?>
<!-- ----------------------------------- Affichage --------------------------------------- -->
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>
<body>
	<h1>Détail des contacts</h1>
	<table>
		<tr>
			<th>Nom</th>
			<th>Prénom</th>
			<th>Téléphone</th>
			<th></th>
		</tr>
		<?php
			for ($i=0;$i<sizeof($valeurs);$i++){
				echo '<tr>
						<td>'.$valeurs[$i]['nom'].'</td>
						<td>'.$valeurs[$i]['prenom'].'</td>
						<td>'.$valeurs[$i]['telephone'].'</td>
						<td><a href="?contact='.$i.'">Autres infos.</a></td>
					 </tr>';
			}
		?>
	</table>
	<?php
		if (!empty($ligne)) {
			echo '<h1>Détails du contact</h1>
					<ul>
						'.$ligne.'
				   </ul>';
		}
	?>
</body>
</html>
