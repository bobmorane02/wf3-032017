<?php

// ******************************************** Fonctions membres ********************************************

function internauteEstConnecte() {
    // Cette fonction indique si l'internaute est connecté : si la session 'membre' est définie, c'est que
    //l'internaute est passé par la page de connexion avec le bon mdp
    if (isset($_SESSION['membre'])) {
        return true;
    } else {
        return false;
    }

    // On peut écrire :
    // return isset($_SESSION['membre']); car isset() retourne déjà un true ou false  
}

function internauteEstConnecteEtEstAdmin () {
    // Cette fonction indique si le membre connecté est admin
    if (internauteEstConnecte() && $_SESSION['membre']['statut'] == 1) {
        return true;
    } else {
        return false;
    }
}

function executeRequete ($req,$param = array()) {   // $param est un array vide par defaut : il est donc optionnel
    // htmlspecialchars :
    if (!empty($param)){
        // Si on a bien reçu un array non vide on le traite
        foreach ($param as $indice => $valeur) {
            $param[$indice] = htmlspecialchars($valeur, ENT_QUOTES);    // transforme en entité HTML chaque caractéres
        }                                                               // spécial, dont les quotes "'"
    }

    // La requête préparée :
    global $pdo;    // On récupére la variable globale $pdo déclarée à l'extérieur de la function
    $r = $pdo->prepare($req);
    $succes = $r->execute($param);  // On execute la requête en lui passant l'array $param qui permet d'associer
                                    // chaque marqueur à sa valeur

    // Traitement erreur SQL événtuelle :
    if (!$succes) { // si $succes vaut false, il y a une erreur sur la requête
        die("Erreur sur la requête SQL : $r->errorinfo()[2]");  // die arrête le script et affiche le message d'erreur :  
    }                                                           // On récupére l'erreur en clair se situant à l'indice 2
                                                                // de l'array renvoyé par la méthode errorinfo() de l'objet
                                                                // PDOStatement $r
    return $r;  // retourne l'objet PDOStatement qui contient le résultat de la requête
}                                   

