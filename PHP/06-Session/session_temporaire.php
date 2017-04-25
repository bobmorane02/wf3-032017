<?php
// Context :  souvent sur les sîtes à haute sécutité, vous êtes déconnecté automatiquement au
// bout d'un certain temps.

session_start();    // on crée une session

echo '<pre>';print_r($_SESSION);echo '</pre>';

if(isset($_SESSION['temps']) && isset($_SESSION['limite'])) {
    // on vérifie si les 10 secondes d'inactivité sont écoulées :
    if (time() > $_SESSION['temps']+$_SESSION['limite']){
        session_destroy();  // si les 10 secondes sont écoulées, on supprime la session
        echo'<hr> Votre session a expiré, vous êtes déconnecté <hr>';
    } else {
        $_SESSION['temps'] = time(); // sinon on met à jour le timestamp
        echo '<hr> Connexion mise à jour <hr>';
    }

} else {    // On entre dans ce else la premiére fois pour remplir la session :
    $_SESSION['temps'] = time();    // On rempli la session avec un indice 'temps' qui contient
                                    // le timestamp de l'instant présent.
    $_SESSION['limite'] = 10;       // On fixe la durée limite de session à 10 secondes
    echo '<hr> Vous êtes connecté <hr>';
}