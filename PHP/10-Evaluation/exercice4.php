<?php
// -------------------------------------------- Traitement ------------------------------------------------
$message ='';   // Initialisation de la variable d'affichage'

$pdo = new PDO('mysql:host=localhost;dbname=exercice_3','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

$resultat = $pdo->query("SELECT id_movie,title,director,year_of_prod FROM movies");

while ($res = $resultat->fetch(PDO::FETCH_ASSOC)) {
    $message .= '<tr><td>'.$res['title'].'</td><td>'.$res['director'].'</td><td>'.$res['year_of_prod'].'</td><td><a href="exercice5.php?id='.$res['id_movie'].'">Plus d\'infos.</a></td></tr>';
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
    <h1>Liste des films</h1>
    <table>
        <tr>
            <th>Titre</th>
            <th>Réalisateur</th>
            <th>Année de production</th>
            <th></th>
        </tr>
        <?php
            echo $message;
        ?>
    </table>
</body>
</html>