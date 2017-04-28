<?php

// -------------------------------------------- TRAITEMENT --------------------------------------------
require_once('inc/init.inc.php');
$inscription = false;   // variable qui permet de savoir si le membre est inscrit, pour ne pas réafficher
                        // le formulaire d'inscription

// Traitement du POST :
if (!empty($_POST)) {    // si le formulaire est rempli

    // Validation du formulaire :
    if (strlen($_POST['pseudo']) < 4 || strlen($_POST['pseudo']) > 20) {
        $contenu .= '<div class="bg-danger"> Le pseudo doit contenir au moins 4 caractères</div>';
    }

    if (strlen($_POST['mdp']) < 4 || strlen($_POST['mdp']) > 20) {
        $contenu .= '<div class="bg-danger"> Le mot de passe doit contenir au moins 4 caractères</div>';
    }
    
    if (strlen($_POST['nom']) < 2 || strlen($_POST['nom']) > 20) {
        $contenu .= '<div class="bg-danger"> Le nom doit contenir au moins 2 caractères</div>';        
    }

    if (strlen($_POST['prenom']) < 2 || strlen($_POST['prenom']) > 20) {
        $contenu .= '<div class="bg-danger"> Le prénom doit contenir au moins 2 caractères</div>';
    }
    
    if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
        $contenu .= '<div class="bg-danger">Email est invalide</div>';
    }
    // filter_var() permet de valider des formats de chaines de caractères pour vérifier qu'il s'agit ici
    // d'email (on pourrait valider une url par exemple)

    if ($_POST['civilite'] != 'm' && $_POST['civilite'] != 'f') {
        $contenu .= '<div class="bg-danger">La civilité est incorrecte</div>';
    }

    if (strlen($_POST['ville']) < 1 || strlen($_POST['ville']) > 20) {
        $contenu .= '<div class="bg-danger"> La ville ne doit pas être vide</div>';
    }

    // Validation du Code postal avec une regexp :
    if (!preg_match('#^[0-9]{5}$#',$_POST['code_postal'])) {
        $contenu .= '<div class="bg-danger">Le code postal n\'est pas valide</div>';
    }
    /*  Explication de l'expression régulière :
        Elle est délimitée par des # au début et à la fin
        Le ^ signifie que l'expression débute par ce qui suit
        le $ signifie que l'expression se termine par ce qui précéde
        [0-9] définit l'interval des caractéres autorisés, ici 0 à 9
        {5} est un quantificateur qui indique qu'il faut 5 caractéres pas plus pas moins
    */

    if (strlen($_POST['adresse']) < 4 || strlen($_POST['adresse']) > 50) {
        $contenu .= '<div class="bg-danger"> L\'adresse doit contenir au moins 4 caractères</div>';
    }

    // Si aucune erreur sur le formulaire, on vérifie l'unicité du pseudo et de l'email avant inscription en BDD :
    if (empty($contenu)) {  // Si $contenu est vide => pas d'erreur

        // On vérifie l'unicité du pseudo
        $membre = executeRequete("SELECT id_membre FROM membre WHERE pseudo = :pseudo",array(':pseudo'=> $_POST['pseudo']));

        if ($membre->rowCount() > 0){   // On compte le nombre de ligne possédant le même pseudo. Si > 0 alors le pseudo existe déja
            $contenu .= '<div class="bg-danger">Le pseudo existe déja !</div>';
        }

        // On vérifie l'unicité de l'email
        $membre = executeRequete("SELECT id_membre FROM membre WHERE email = :email",array(':email'=> $_POST['email']));

        if ($membre->rowCount() > 0){   // On compte le nombre de ligne possédant le même email. Si > 0 alors l'email existe déja
            $contenu .= '<div class="bg-danger">L\'email existe déja !</div>';
        }

        // Si le pseudo et l'email sont uniques, on peut faire l'inscription en BDD
        if (empty($contenu)) {
            $_POST['mdp'] = md5($_POST['mdp']); // permet d'encrypter le mot de passe selon l'algorithme md5. Il faudra le faire
                                                // également sur la page de connexion pour comparer les 2 mots cyptés
            executeRequete("INSERT INTO membre (pseudo,mdp,nom,prenom,email,civilite,ville,code_postal,adresse,statut) VALUES (:pseudo,:mdp,:nom,:prenom,:email,:civilite,:ville,:code_postal,:adresse,0)",array(:pseudo => $_POST['pseudo'],:mdp => $_POST['mdp'],:nom => $_POST['nom'],:prenom => $_POST['prenom'],:email => $_POST['email'],:civilite => $_POST['civilite'],:ville => $_POST['ville'],:code_postal => $_POST['code_postal'],:adresse => $_POST['adresse'],));

            $contenu .= '<div class="bg-success">Vous êtes inscrit. <a href="connexion.php">Cliquez ici pour vous connecter</a></div>';
            $inscription = true;    // pour ne plus afficher le formulaire d'inscription        
        }   // fin if (empty($contenu))        
    }   // fin du if (empty($contenu))
} // Fin du if(!empty($_POST))





// --------------------------------------------  AFFICHAGE --------------------------------------------
require_once('inc/haut.inc.php');
echo $contenu;  // affice les message du site

if(!$inscription) : // Si membre non incrit ($inscription vaut false), on affiche le formulaire
?>
<h3>Veuillez renseigner le formulaire pour vous inscrire</h3>
<form method="post" action="">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo" value=""><br><br>

    <label for="mdp">Mot de passe</label><br>
    <input type="password" id="mdp" name="mdp" value=""><br><br>

    <label for="nom">Nom</label><br>
    <input type="text" id="nom" name="nom" value=""><br><br>

    <label for="prenom">Prénom</label><br>
    <input type="text" id="prenom" name="prenom" value=""><br><br>

    <label for="email">Email</label><br>
    <input type="text" id="email" name="email" value=""><br><br>

    <label >Civilité</label><br>
    <input type="radio" name="civilite" id="homme" value="m" checked><label for="homme">Homme</label><br>
    <input type="radio" name="civilite" id="femme" value="f" ><label for="femme">Femme</label><br>

    <label for="ville">Ville</label><br>
    <input type="text" id="ville" name="ville" value=""><br><br>
    
    <label for="code_postal">Code postal</label><br>
    <input type="text" id="code_postal" name="code_postal" value=""><br><br>
    
    <label for="adresse">Adresse</label><br>
    <textarea id="adresse" name="adresse"></textarea><br><br>

    <input type="submit" name="inscription" value="s'inscrire" class="btn">
</form>

<?php
endif;  // syntaxe du if avec ":" qui remplace la premiére accolade et "endif" qui remplace la seconde








require_once('inc/bas.inc.php');
