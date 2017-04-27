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

    // Contrôles du formulaire :
        if (strlen($_POST['prenom'])<3 || strlen($_POST['prenom']>20)){
            $message .= '<p>Le prénom doit comporter au moins 3 caractéres</p>';
        }
        if (strlen($_POST['nom'])<3 || strlen($_POST['nom']>20)){
            $message .= '<p>Le nom doit comporter au moins 3 caractéres</p>';
        }
        if ($_POST['sexe'] != 'm' && $_POST['sexe'] != 'f'){
            $message .= "<p>le sexe n'est pas indiqué</p>";
        }
        if (strlen($_POST['service'])<3 || strlen($_POST['service']>20)){
            $message .= '<p>Le service doit comporter au moins 3 caractéres</p>';
        }      
        if (!is_numeric($_POST['salaire']) || $_POST['salaire'] <= 0){ // is_numeric() teste si c'est un nombre
            $message .= "<p>Le salaire doit étre supérieur à 0</p>"; 
        }

        $tab_date = explode('-',$_POST['dateE']);   // met le jour , le mois et l'année dans un array pour ensuite les passer à
                                                    // la fonction checkdate($mois,$jour,$annee)
        if(!(isset($tab_date[0]) && isset($tab_date[1]) && isset($tab_date[2]) && checkdate($tab_date[1],$tab_date[2],$tab_date[0]))){
            $message .= "<p>La date n'est pas valide</p>";  // checkdate($mois,$jpur,$annee)
        }
        
        if (empty($message)){   // si les messages sont vides => pas d'erreur

            $resultat = $pdo->prepare("INSERT INTO employes (prenom,nom,sexe,service,date_embauche,salaire) VALUES (:nom,:prenom,:sexe,:service,:dateE,:salaire)");
            $resultat->bindParam (':prenom',$_POST['prenom'],PDO::PARAM_STR);
            $resultat->bindParam (':nom',$_POST['nom'],PDO::PARAM_STR);
            $resultat->bindParam (':sexe',$_POST['sexe'],PDO::PARAM_STR);
            $resultat->bindParam (':service',$_POST['service'],PDO::PARAM_STR);
            $resultat->bindParam (':dateE',$_POST['dateE'],PDO::PARAM_STR);
            $resultat->bindParam (':salaire',$_POST['salaire'],PDO::PARAM_STR);

            $req = $resultat->execute();
            $message = $req?"<p>L'employé a bien été ajouté":"Erreur lors de l'enregistrement</p>";
        }
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
        <h1>Enregistrer un nouvel employé</h1>
        <form method="post" action="">
            <label for="prenom">Prénom</label>
            <input type="text" id="prenom" placehorder="Prénom" name = "prenom">
            <label for="nom">Nom</label>
            <input type="text" id="nom" placehorder="Nom" name = "nom">
            <fieldset>
                <legend>Sexe</legend>
                <input type="radio" name="sexe" value="m" checked>Homme
                <input type="radio" name="sexe" value="f">Femme
            </fieldset>
            <label for="service">Service</label>
            <input type="text" id="service" name="service" placeholder="Service">
            <label for="dateE">Date d'embauche</label>
            <input type="text" id="dateE" name="dateE" placeholder="AAAA-MM-JJ">
            <label for="salaire">Salaire</label>
            <input type="number" id="salaire" name="salaire" placeholder="0">
            <input type="submit" value="Ajouter">
        </form>
        <?php
          echo $message;
        ?>
    </main>
</body>
</html>
