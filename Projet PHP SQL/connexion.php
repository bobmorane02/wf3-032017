<?php
    require_once ('inc/init.inc.php');

    $reponse = array();
    $reponse['resultat'] = '';
    $reponse['erreur'] = false;

    if ($_POST['mode'] == 'connexion') {
        if (empty($_POST['pseudo'])){
            $reponse['resultat'] .= '<div>Pseudo requis</div>';
            $reponse['erreur'] = true;
        }

        if (empty($_POST['mdp'])){
            $reponse['resultat'] .= '<div>Mot de passe requis</div>';
            $reponse['erreur'] = true;
        }
 
        if (!$reponse['erreur']) {
            $pseudo = htmlspecialchars($_POST['pseudo'],ENT_QUOTES);
            $mdp = sha1($_POST['mdp']);

            $r = $pdo->prepare("SELECT * FROM membre WHERE mdp = :mdp AND pseudo = :pseudo");
            $r->bindParam(':mdp',$mdp,PDO::PARAM_STR);
            $r->bindParam(':pseudo',$pseudo,PDO::PARAM_STR);
            $r->execute();

            if (!$r->rowCount()) {
                $reponse['resultat'] = '<div>Pseudo ou mot de passe incorrect</div>';
                $reponse['erreur'] = true;        
            }
        }

        if (!$reponse['erreur']) {
            $r = $pdo->prepare("SELECT id_membre,pseudo,nom,prenom,email,civilite,status,DATE_FORMAT(date_enregistrement,'%d-%m-%Y à %H:%i:%s') AS date_fr FROM membre WHERE pseudo = :pseudo");
            $r->bindParam(':pseudo',$pseudo,PDO::PARAM_STR);
            $r->execute();
            $resultat = $r->fetch(PDO::FETCH_ASSOC);           
            $_SESSION['id'] = $resultat['id_membre'];
            $_SESSION['pseudo'] = $resultat['pseudo'];        
            $_SESSION['nom'] = $resultat['nom'];
            $_SESSION['prenom'] = $resultat['prenom'];
            $_SESSION['email'] = $resultat['email'];
            $_SESSION['civilite'] = $resultat['civilite'];
            $_SESSION['mode'] = $resultat['status'];
            $_SESSION['date'] = $resultat['date_fr'];
            if ($_SESSION['mode'] == 0) {
                $fichier = file_get_contents('json/menu_membre.json');
                $reponse['resultat'] = json_decode($fichier,true);
            }
            if ($_SESSION['mode'] == 1) {
                $fichier = file_get_contents('json/menu_admin.json');
                $reponse['resultat'] = json_decode($fichier,true);
            }       
        }
    }

    if ($_POST['mode'] == 'deconnexion'){
        session_destroy();
        $fichier = file_get_contents('json/menu_visiteur.json');
        $reponse['resultat'] = json_decode($fichier,true);        
    }

    if ($_POST['mode'] == 'inscription'){
        if (empty($_POST['pseudo'])) {
            $reponse['resultat'] .= '<div>Pseudo requis</div>';
            $reponse['erreur'] = true;
        }

        if (empty($_POST['mdp'])) {
            $reponse['resultat'] .= '<div>Mot de passe requis</div>';
            $reponse['erreur'] = true;
        }

        if (empty($_POST['nom'])) {
            $reponse['resultat'] .= '<div>Nom requis</div>';
            $reponse['erreur'] = true;
        }

        if (empty($_POST['prenom'])) {
            $reponse['resultat'] .= '<div>Prenom requis</div>';
            $reponse['erreur'] = true;
        }

        if (empty($_POST['email'])) {
            $reponse['resultat'] .= '<div>Email requis</div>';
            $reponse['erreur'] = true;
        }

        if (!$reponse['erreur']){
            $pseudo = htmlspecialchars($_POST['pseudo']);
            $nom = htmlspecialchars($_POST['nom']);
            $prenom = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $civilite = $_POST['civilite'];
            $mdp = sha1($_POST['mdp']);
        }        

        $r = $pdo->prepare("SELECT * FROM membre WHERE pseudo = :pseudo");
        $r->bindParam(':pseudo',$pseudo,PDO::PARAM_STR);
        $r->execute();

        if ($r->rowCount()){
            $reponse['resultat'] .= '<div>Le pseudo existe déja</div>';
            $reponse['erreur'] = true;             
        }

        if (!$reponse['erreur']){
            $r = $pdo->prepare("INSERT INTO membre (pseudo,mdp,nom,prenom,email,civilite,status,date_enregistrement) VALUES (:pseudo,:mdp,:nom,:prenom,:email,:civilite,0,NOW())");
            $r->bindParam(':pseudo',$pseudo,PDO::PARAM_STR);
            $r->bindParam(':mdp',$mdp,PDO::PARAM_STR);
            $r->bindParam(':nom',$nom,PDO::PARAM_STR);
            $r->bindParam(':prenom',$prenom,PDO::PARAM_STR);
            $r->bindParam(':email',$email,PDO::PARAM_STR);
            $r->bindParam(':civilite',$civilite,PDO::PARAM_STR);
            $r->execute();
            $_SESSION['id'] = $pdo->lastInsertId();
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['email'] = $email;
            $_SESSION['civilite'] = $civilite;
            $_SESSION['mode'] = 0;
            $_SESSION['pseudo'] = $pseudo;
            $rep = $pdo->query("SELECT DATE_FORMAT(date_enregistrement,'%d-%m-%Y à %H:%i:%s') AS date_fr FROM membre WHERE id_membre = $_SESSION[id]");
            $tab = $rep->fetch(PDO::FETCH_NUM);
            $_SESSION['date'] = $tab[0];
            $fichier = file_get_contents('json/menu_membre.json');
            $reponse['resultat'] = json_decode($fichier,true);                
        }
    }

    echo json_encode($reponse);

