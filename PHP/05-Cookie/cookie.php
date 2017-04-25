<?php
// ********************************************
// Les cookies
// ********************************************
/*  Le cookie est un petit fichier (4ko max) déposé par le serveur du site sur le poste de  l'internaute
    et qui peut contenir des informations sous forme de texte. Lescookies sont automatiquement renvoyés 
    au serveur web par le navigateur lorsque l'internaute navique dans les pages concernées par les cookies.

    PHP peut trés facilement récupérer les données contenues dans les cookies : ces informations sont stockées
    dans la superglobale $_COOKIE.

    Précaution à prendre avec les cookies : un cookie étant sauvegardé sur le poste de l'internaute, il peut 
    être volé ou détourné. On n'y stocke donc pas de données sensibles (mot de passe, numéro de CB,...).
*/

// Application pratique : nous allons stoker la langue choisie par l'internaute dans un cookie.
// 1- Affectation de la langue à la variable $langue 
if (isset($_GET['langue'])){    // Si une langue est passée dans l'URL, un lien a été cliqué
    $langue = $_GET['langue'];
} elseif (isset($_COOKIE['langue'])) {  // $_COOKIE est un superglobale dont correspond au nom du cookie
                                        // On entre dans le elseif i cookie appelé "langue" a été envoyé par le client.
    $langue = $_COOKIE['langue'];
} else {
    $langue = 'fr'; // par défaut, si aucun choix n'est fait et que n'existe pas de cookie alors on affecte 'fr'.
}
// 2- Envoi du cookie avec la langue :
$un_an = 365*24*60*60;  // 1 an exprimé en secondes.

setCookie('langue',$langue,time()+$un_an);  // setCookie('nom','valeur',date d'expiration en timestamp) permet de créer
                                            // d'envoyer le cookie vers la client.

// 3- Affichage de la langue :
echo 'Votre langue : ';
switch($langue){
    case 'fr' : echo 'français';break;
    case 'es' : echo 'espagnol';break;
    case 'en' : echo 'anglais';break;
    case 'it' : echo 'italien';break;
}

?>

<h1>Votre langue :</h1>
<ul>
    <li><a href="?langue=fr">Français</a></li>
    <li><a href="?langue=es">Espagnol</a></li>
    <li><a href="?langue=en">Anglais</a></li>
    <li><a href="?langue=it">Italien</a></li>    
</ul>