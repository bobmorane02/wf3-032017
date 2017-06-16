<?php
  require_once ('connexion.php');

  
$req = "INSERT INTO users (nom,prenom,email,password,type) VALUES (";
$errors = [];
 echo '<pre>';print_r($_POST);echo '</pre>';
if (isset($_POST['inscription'])){
  foreach ($_POST['inscription'] as $index => $valeur){
      
      if (empty($_POST['inscription'][$index])){
          if ($index == 'password'){
            $errors[] = "Le mot de passe est vide";
          } else {
            $errors[] = "Le $index est vide";
          }
        } else {
            if ( $index == 'email' ){
              $resultat = $db->prepare("SELECT email FROM users WHERE email = :email");
              $resultat->bindValue(':email',$_POST['inscription'][$index]);
              if ($resultat->execute()) {
                  if ($resultat->rowCount() != 0){
                    $errors[] = "l'email existe déja";
                  } else {
                    $_POST['inscription'][$index] = strip_tags(trim($_POST['inscription'][$index]));
                    $req .= ':email,';
                  }
              } else {
                $errors[] = 'Erreur SQL';
              }
            } elseif ( $index == 'password'){
                $_POST['inscription'][$index] = sha1($_POST['inscription'][$index]);
                $req .= ':password';
            } else {
              if ($index == 'type'){
                $req .= ":$index)";
              } else {
                $req .= ":$index,";
              }
            }

      }
  }

  if (count($errors) == 0){

      $res = $db->prepare($req);
      $res->bindValue (':nom',$_POST['inscription']['nom']);
      $res->bindValue (':prenom',$_POST['inscription']['prenom']);
      $res->bindValue (':email',$_POST['inscription']['email']);
      $res->bindValue (':password',$_POST['inscription']['password']);
      $res->bindValue (':type',$_POST['inscription']['type']);

      if ($res->execute()){
        $reussi = "L'utilisateur est enregistré";
      } else {
        $errors = 'Erreur SQL';
      }
  }  
}


?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Inscription</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <style>
    .myform-container.myform {
      max-width: 600px;
      padding: 40px 40px;
    }

    .btn {
      font-weight: 700;
      height: 36px;
      -moz-user-select: none;
      -webkit-user-select: none;
      user-select: none;
      cursor: default;
    }

    .myform {
      background-color: #F7F7F7;
      padding: 20px 25px 30px;
      margin: 0 auto 25px;
      margin-top: 50px;
      -moz-border-radius: 2px;
      -webkit-border-radius: 2px;
      border-radius: 2px;
      -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
      box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    }
  </style>
</head>
<body>

  <div class="myform myform-container">
    <form class="form-horizontal" method="POST" action="">

      <div class="form-group">
        <div class="col-sm-12">
          <input type="text" class="form-control" name="inscription[nom]" placeholder="Nom" autofocus>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <input type="text" class="form-control" name="inscription[prenom]" placeholder="Prénom">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <input type="email" name="inscription[email]" class="form-control" placeholder="Email">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <input type="password" name="inscription[password]" class="form-control" placeholder="Mot de passe">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <div class="radio">
            <label>
              <input type="radio" name="inscription[type]" value="eleve"> Elève
            </label>
          </div>
          <div class="radio">
            <label>
              <input type="radio" name="inscription[type]" value="formateur"> Formateur
            </label>
          </div>
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-12">
          <button type="submit" name="submit" class="btn btn-default">S'inscrire</button>
        </div>
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>