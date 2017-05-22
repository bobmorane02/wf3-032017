<?php
    require_once ('inc/init.inc.php');

    // ---------------------------- Traitement --------------------------------
    if (empty($_POST['pseudo'])){
        $message .= '<div>Pseudo requis<div>';
    }

    if (empty($_POST['mdp'])){
        $message .= '<div>Mot de passe requis</div>';
    }

    if (empty($message)) {
        $pseudo = htmlspecialchars($_POST['pseudo'],ENT_QUOTES);
        $mdp = htmlspecialchars($_POST['mdp'],ENT_QUOTES);

        $r = $pdo->prepare("SELECT * FROM membre WHERE mdp = :mdp AND pseudo = :pseudo");
        $r->bindParam(':mdp',$mdp,PDO::PARAM_STR);
        $r->bindParam(':pseudo',$pseudo,PDO::PARAM_STR);
        $r->execute();

        if ($r->rowCount()) {
            $message = '<div>Présent dans la base</div>';
        } else {
            $message = '<div>Inconnu</div>';
        }
    }

    echo json_encode($message);

