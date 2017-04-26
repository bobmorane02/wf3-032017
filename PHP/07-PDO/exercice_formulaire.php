<?php
// EXERCICE :
// Principe : créer un formulaire qui permet d'enregistrer un nouvel employé dans la base entreprise

/*  les étapes :
        1- Création du formulaire HTML
        2- Connexion à la BDD
        3- Lorsque le formulaire est posté, insertion des info du formulaire en BDD. Faites-le avec une requête préparée.
        4- Afficher à la fin un message "L'employé a bien ete ajouté". 
*/

$pdo = new PDO('mysql:host=localhost;dbname=entreprise','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
$message = '';
if (!empty($_POST)){
    echo'<pre>';print_r($_POST);echo'</pre>';
}
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
    <main>
        <form method="post" action="">
            <label for="prenom">Prenom</label>
            <input type="text" id="prenom" placehorder="Prénom" name = "prenom">
            <label for="nom">Nom</label>
            <input type="text" id="nom" placehorder="Nom" name = "nom">
            <fieldset>
                <legend>Sexe</legend>
                <input type="radio" name="sexe" value="m">Homme
                <input type="radio" name="sexe" value="f">Femme
            </fieldset>
            <label for="service">Service</label>
            <input type="text" id="service" name="service" placeholder="Service">
            <label for="date">Date d'embauche</label>
            <input type="text" id="date" name="date" placeholder="AAAA/MM/JJ">
            <label for="salaire">Salaire</label>
            <input type="number" id="salaire" name="salaire" placeholder="0">
            <input type="submit" value="Ajouter">
        </form>
        <p></p>
    </main>
</body>
</html>
