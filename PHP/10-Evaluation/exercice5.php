<?php
// -------------------------------------------- Traitement ------------------------------------------------
$message ='';   // Initialisation de la variable d'affichage'


$pdo = new PDO('mysql:host=localhost;dbname=exercice_3','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

if (!empty($_GET)) {
    $resultat = $pdo->prepare("SELECT * FROM movies WHERE id_movie = :id");
     $resultat->bindParam (':id',$_GET['id'],PDO::PARAM_INT);
     $res = $resultat->execute();

     if (!$res) {
         $message .= 'Erreur le film n\'existe pas !';
     }

     $r = $resultat->fetch(PDO::FETCH_ASSOC);
     
     foreach ($r as $index => $valeur) {
         $message .= "<li>$index : $valeur</li>";
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
    <h1>Détail du film</h1>
    <ul>
        <?php echo $message; ?>
    </ul>
</body>
</html>