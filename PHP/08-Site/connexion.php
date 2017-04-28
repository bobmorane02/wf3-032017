<?php
require_once('inc/init.inc.php');

// -------------------------------------------- TRAITEMENT --------------------------------------------
// Déconnexion demandée par l'internaute :
if (isset($_GET['action']) && $_GET['action']=='deconnexion') {
    // Si l'internaute demande la déconnexion, on détruit la session :
    session_destroy();
}

// Internaute déja connecté :
if (internauteEstConnecte()) {  // Si l'internaute est déja connecté, il n'a rien à faire ici on le redirige
                                // vers son profil
    header('location:profil.php');  // demande la page profil.php
}

// Traitement du formulaire de connexion et remplissage de la session :
if(!empty($_POST)) {
    // contrôle de formulaire :
    if (empty($_POST['pseudo'])){
        $contenu .= '<div class="bg-danger">Le pseudo est requis</div>';
    }
    if (empty($_POST['mdp'])){
        $contenu .= '<div class="bg-danger">Le mot de passe est requis</div>';
    }

    // Si le formulaire est correct, on contrôle les identifiants :
    if(empty($contenu)) {
        $mdp = md5($_POST['mdp']); // Cryptage du mdp pour comparaison avec la BDD
        $resultat = executeRequete("SELECT * FROM membre WHERE pseudo = :pseudo AND mdp = :mdp",array(':pseudo'=>$_POST['pseudo'],':mdp'=>$mdp));

        if($resultat->rowCount()) { // S'il y a un enregistrement dans $résultat, c'est que le pseudo/mot de passe est OK
            $membre = $resultat->fetch(PDO::FETCH_ASSOC); // pas de while car il y a unicité du pseudo

            $_SESSION['membre'] = $membre;  // nous remplissons la session avec les éléments provenant de la BDD. Cette session permet
                                            // de conserver les infos du membre dans l'ensemble du site.
            header('location:profil.php');
            exit();
        } else {
            // Si les identifiants ne correspondent pas, on affiche un message d'erreur :
            $contenu .= '<div class="bg-danger">Erreur sur les identifiants</div>';
        }
    } // Fin du if(empty($contenu))

} // Fin du if(!empty($_POST))

// --------------------------------------------  AFFICHAGE --------------------------------------------
require_once('inc/haut.inc.php');
echo $contenu;
?>
<h3>Veuillez renseigner vos identifiants pour vous connecter</h3>
<form method="post" action="">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" value=""><br><br>

    <label for="mdp">Mot de passe</label><br>
    <input type="password" id="mdp" name="mdp" value=""><br><br>

    <input type="submit" >
    
</form>

<?php
require_once('inc/bas.inc.php');
