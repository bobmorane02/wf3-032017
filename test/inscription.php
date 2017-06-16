<?php
    require_once ('connexion.php');

    $req_insert = "INSERT INTO users (nom,prenom,email,password,type) VALUES (:nom,:prenom,:email,:password,:type)";
    $req_email = "SELECT * FROM users WHERE email = :email";
    $errors = [];
    $tab_err = array('nom' => FALSE, 'prenom' => FALSE, 'email' => FALSE, 'password' => FALSE, 'type' => FALSE);
    $ins = array('nom' => '', 'prenom' => '', 'email' => '', 'password' => '', 'type' => '');
    $ok = FALSE;

    if (!empty($_POST) && isset($_POST['inscription'])) {

        $ins = $_POST['inscription'];

        foreach ($ins as $index => $valeur) {
            if (empty($ins[$index])) {
                switch ($index) {
                    case 'password':
                        $tab_err['password'] = TRUE;
                        $errors[] = 'Veuillez fournir un mot de passe';
                        break;
                    case 'type':
                        break;
                    default:
                        switch ($index) {
                            case 'nom':
                                $tab_err['nom'] = TRUE;
                                break;
                            case 'prenom':
                                $tab_err['prenom'] = TRUE;
                                break;
                            default:
                                $tab_err['email'] = TRUE;
                                break;
                        }
                        $errors[] = "Veuillez fournir un $index";
                        break;
                }
            }
        }

        if (count($ins) < 5) {
            $tab_err['type'] = TRUE;
            $errors[] = 'Veuillez indiquer votre situation';
        } elseif ($ins['type'] != 'eleve' && $ins['type'] != 'enseignant') {
                $tab_err['type'] = TRUE;
                $errors[] = 'Situation non valide';
        }

        if (count($errors) == 0){
            if (strpos(trim($ins['email'])," ") !== FALSE || !filter_var($ins['email'],FILTER_VALIDATE_EMAIL)){
                $errors[] = 'Email invalide';
                $tab_err['email'] = TRUE; 
            } else {
                $ins['email'] = strip_tags($ins['email']);
            }
        }         

        if (count($errors) == 0) {
            $rep = $db->prepare($req_email);
            $rep->bindParam(':email',$ins['email'],PDO::PARAM_STR);
            if ($rep->execute()){
                if ($rep->rowCount() > 0){
                    $errors[] = "Cet email existe déja";
                }
            } else {
                $errors[] = 'Erreur SQL';
            }
        }

        if (count($errors) == 0) {
            $ins['nom'] = strtoupper(strip_tags(trim($ins['nom'])));
            $ins['prenom'] = ucfirst(strtolower(strip_tags(trim($ins['prenom']))));
            $ins['password'] = sha1($ins['password'].$ins['nom']);
            $rep = $db->prepare($req_insert);
            $rep->bindParam(':nom',$ins['nom'],PDO::PARAM_STR);
            $rep->bindParam(':prenom',$ins['prenom'],PDO::PARAM_STR);
            $rep->bindParam(':email',$ins['email'],PDO::PARAM_STR);
            $rep->bindParam(':password',$ins['password'],PDO::PARAM_STR);
            $rep->bindParam(':type',$ins['type'],PDO::PARAM_STR);
            if ($rep->execute()) {
                $ok = TRUE;
            } else {
                $errors[] = 'Erreur SQL';
            }
        }
        
    }

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Document</title>
    <style>
        form {
            padding: 2rem;
        }

        .panel {
            margin-top: 10rem;
        }

        div .radio {
            margin-top: 0;
        }

        .glyphicon {
            margin-left: 1rem;
        }

    </style>
</head>
<body>
    
        <div class="container">
            <div class="col-lg-5 col-lg-offset-3 col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><strong>Inscription</strong></h3>
                    </div>
                    <form method="post" action="">
                        <div class="form-group <?php if($tab_err['nom']): ?>has-error<?php endif; ?>">
                            <label for="nom">Nom</label>
                            <input type="text" class="form-control" id="nom" name="inscription[nom]" placeholder="Votre nom"  <?php if(!$tab_err['nom'] && !$ok): echo 'value="'.$ins['nom'].'"'; endif; ?>>
                        </div>
                        <div class="form-group <?php if($tab_err['prenom']): ?>has-error<?php endif; ?>">
                            <label for="prenom">Prénom</label>
                            <input type="text" class="form-control" id="prenom" name="inscription[prenom]" placeholder="Votre prénom"  <?php if(!$tab_err['prenom'] && !$ok): echo 'value="'.$ins['prenom'].'"'; endif; ?>>
                        </div>
                        <div class="form-group <?php if($tab_err['email']): ?>has-error<?php endif; ?>">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="inscription[email]" placeholder="Votre email" <?php if(!$tab_err['email'] && !$ok): echo 'value="'.$ins['email'].'"'; endif; ?>>
                        </div>
                        <div class="form-group <?php if($tab_err['password']): ?>has-error<?php endif; ?>">
                            <label for="password">Mot de Passe</label>
                            <input type="password" class="form-control" id="password" name="inscription[password]" placeholder="Mot de passe">
                        </div>
                        <label>Situation</label>
                        <div class="radio <?php if($tab_err['type']): ?>has-error<?php endif; ?>">
                            <label class="radio-inline">
                                <input type="radio" name="inscription[type]" value="eleve" <?php if((!$tab_err['type'] && !$ok) && $ins['type'] == 'eleve'): ?>checked<?php endif; ?>>Élève                                
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="inscription[type]" value="enseignant" <?php if((!$tab_err['type'] && !$ok) && $ins['type'] == 'enseignant'): ?>checked<?php endif; ?>>Enseignant                                
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary">S'enregistrer<span class="glyphicon glyphicon-pencil"></span></button>
                    </form>
                </div>
                <div class="alert <?php if (count($errors) == 0 && $ok){
                                            echo 'alert-success';
                                        } elseif ((count($errors) == 0 || count($errors) == 5) && !$ok) {
                                            echo 'hidden';
                                        } else {
                                            echo 'alert-danger';
                                        }
                                   ?>" role="alert">
                    <?php 
                        if (count($errors)>0 && count($errors)<5){
                            for ($i=0;$i<sizeof($errors);$i++){
                                echo "<p>$errors[$i]</p>";
                            }
                        } elseif ($ok){
                            echo 'Utilisateur enregistré';
                        }
                    ?>
                </div>
            </div>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>