<?php
require_once("inc/init.inc.php");
$tab = array();
$tab['resultat'] = "";
$tab['pseudo'] = "disponible";
$erreur = false; // variable de contrôle en fin script. Si sa valeur est passée à true alors il y a une erreur (ex: pseudo indisponible)

$mode = isset($_POST['mode'])? htmlspecialchars($_POST['mode'],ENT_QUOTES):'';
$pseudo = isset($_POST['pseudo'])?htmlspecialchars($_POST['pseudo'],ENT_QUOTES):'';
$ville = isset($_POST['ville'])?htmlspecialchars($_POST['ville'],ENT_QUOTES):'';
$civilite = isset($_POST['civilite'])?htmlspecialchars($_POST['civilite'],ENT_QUOTES):'';
$date_de_naissance = isset($_POST['date_de_naissance'])?htmlspecialchars($_POST['date_de_naissance'],ENT_QUOTES):'';

if($mode == "connexion") {
    // Traitement de la connexion/inscription
    // requête pour tester si le pseudo est déja en BDD
    $resultat = $pdo->query("SELECT * FROM membre WHERE pseudo = '$pseudo'");
    $membre =  $resultat->fetch(PDO::FETCH_ASSOC);
    $time = time();
    if($resultat->rowCount() == 0) { // s'il n'y a pas de ligne alors le pseudo est libre car inexistant en BDD
        $pdo->query("INSERT INTO membre (pseudo,civilite,ville,date_de_naissance,ip,date_connexion) VALUES ('$pseudo','$civilite','$ville','$date_de_naissance','$_SERVER[REMOTE_ADDR]','$time')");

        $id_membre = $pdo->lastInsertId(); // on récupére le dernier id inséré

        $tab['resultat'] = "Membre enregistré !";
    } elseif ($resultat->rowCount() > 0 && $_SERVER['REMOTE_ADDR'] == $membre['ip']){
        // si le pseudo existe et que l'adresse ip est la même que celle enregistrée, c'est donc le même utilisateur
        // on met à jour uniquement sa date de connexion
        $time = time();
        $pdo->query ("UPDATE membre SET date_connexion=$time WHERE id_membre = $membre[id_membre]");
        $id_membre = $membre['id_membre'];
    } else {
        // le pseudo est déja pris et l'adresse ip ne correspond pas à ce pseudo.
        $tab['resultat'] = "Pseudo indisponible, veuillez recommencer";
        $erreur = true; // Positionnement de la variable d'erreur
        $tab['pseudo'] = "indisponible";
    }

    if (!$erreur) { // Si pas d'erreurs
        // on place dans $_SESSION le pseudo, l'id et la civilité de l'utilisateur.
        $_SESSION['id_membre'] = $id_membre;
        $_SESSION['pseudo'] = $pseudo;
        $_SESSION['civilite'] = $civilite;

        $f = fopen("prenom.txt","a"); // on ouvre un fichier prenom.txt sinon on le crée
        fwrite($f,$pseudo."\n"); // on écrit dans le fichier le pseudo de l'utilisateur
        fclose($f); // pour fermer le fichier et libérer la ressource.
    }
}
echo json_encode($tab);