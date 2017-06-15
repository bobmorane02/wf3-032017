<?php
    require ('connexion.php');

    $req = "SELECT name FROM users WHERE email = :email";
    $req_login = "SELECT * FROM users WHERE email = :email AND password = :password";

    $connect = array('email' => '','password' => '' ,'name' => '');
    $errors = [];
    $tab_err = array('email' => FALSE, 'password' => FALSE);

    if (!empty($_POST)) {
        $connect = $_POST['connexion'];

        foreach ($connect as $index => $valeur) {
            if(empty($connect[$index])){
                if ($index == 'email'){
                    $errors[] = "Veuillez renseigner l'email";
                    $tab_err['email'] = TRUE;
                } else {
                    $errors[] = "Veuillez entrer votre mot de passe";
                    $tab_err['password'] = TRUE;
                }
            }
        }

        if (count($errors) == 0){
            $connect['email'] = filter_var(trim($connect['email']),FILTER_SANITIZE_EMAIL);
            if (strpos($connect['email']," ") !== FALSE || !filter_var($connect['email'],FILTER_VALIDATE_EMAIL)){
                $errors[] = 'Email invalide';
                $tab_err['email'] = TRUE; 
            } else {
                $connect['email'] = strip_tags($connect['email']);
                $rep = $db->prepare($req);
                $rep->bindValue(':email',$connect['email'],PDO::PARAM_STR);
                if ($rep->execute()){
                    if ($rep->rowCount() == 0){
                        $errors[] = "Erreur d'identification";
                    } else {
                        $connect['name'] = $rep->fetch(PDO::FETCH_ASSOC)['name'];
                    }
                } else {
                    $errors[] = 'Erreur SQL';
                }
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
                    <h3 class="panel-title"><strong>Connexion</strong></h3>
                </div>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="connexion[email]" placeholder="Votre email">
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="connexion[password]" placeholder="Votre mot de passe">
                    </div>
                    <button type="submit" class="btn btn-primary">Connexion<span class="glyphicon glyphicon-log-in"></span></button>
                </form>
            </div>
            <div class="alert" role="alert">
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>