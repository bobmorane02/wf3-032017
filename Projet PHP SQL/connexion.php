<?php
    require_once ('inc/init.inc.php');

    // ---------------------------- Traitement --------------------------------
    $reponse = array();
    $reponse['resultat'] = '';

    if (empty($_POST['pseudo'])){
        $reponse['resultat'] .= '<div>Pseudo requis</div>';
    }

    if (empty($_POST['mdp'])){
        $reponse['resultat'] .= '<div>Mot de passe requis</div>';
    }

    if (empty($reponse['resultat'])) {
        $pseudo = htmlspecialchars($_POST['pseudo'],ENT_QUOTES);
        $mdp = htmlspecialchars($_POST['mdp'],ENT_QUOTES);

        $r = $pdo->prepare("SELECT * FROM membre WHERE mdp = :mdp AND pseudo = :pseudo");
        $r->bindParam(':mdp',$mdp,PDO::PARAM_STR);
        $r->bindParam(':pseudo',$pseudo,PDO::PARAM_STR);
        $r->execute();

        if (!$r->rowCount()) {
            $reponse['resultat'] = '<div>Pseudo ou mot de passe incorrect</div>';
        }
    }

    if (empty($reponse['resultat'])) {
        $r = $pdo->prepare("SELECT id_membre,nom,prenom,email,civilite,status,DATE_FORMAT(date_enregistrement,'%d-%m-%Y à %H:%i:%s') AS date_fr FROM membre WHERE pseudo = :pseudo");
        $r->bindParam(':pseudo',$pseudo,PDO::PARAM_STR);
        $r->execute();
        $resultat = $r->fetch(PDO::FETCH_ASSOC);
        $reponse['resultat'] = 'OK';
        $_SESSION['id'] = $resultat['id_membre'];
        $_SESSION['nom'] = $resultat['nom'];
        $_SESSION['prenom'] = $resultat['prenom'];
        $_SESSION['email'] = $resultat['email'];
        $_SESSION['civilite'] = $resultat['civilite'];
        $_SESSION['mode'] = $resultat['status'];
        $_SESSION['date'] = $resultat['date_fr'];
        
        header('location:index.php');
    }
    
    echo json_encode($reponse);

