<?php
// --------------------------------------------
// Les sessions
// --------------------------------------------
/*  Le terme de SESSION désigne la période de temps correspondant à la navigation continue
    de l'internaute sur un site : continue, car si l'internaute ferme le navigateur, la session
    s'interrompt

    Principe : un fichyier temporaire appelé session est créé sur le serveur, avec un identifiant unique.
    Cette session est liée à un internaute car, dans le même temps un cookie est déposé sur le poste de 
    l'internaute avec l'identifiant. Ce cookie se détruit lorsqu'on quitte le navigateur.

    On stocke entre autre dans les session, les paniers d'achats ou les informations de connexion. Ces
    informations sont accesssibles dans tous les scripts du sîte grace à la session.
*/

// Création ou ouverture d'une session :
session_start();    // permet de créer un fichier de session sur le serveur OU de l'ouvrir s'il existe déja.

// Remplissage de la session :
$_SESSION['pseudo'] = 'Robert';
$_SESSION['mdp'] = '1234';  // $_SESSION est une superglobale, donc un array

echo '1- La session après remplissage : ';
echo '<pre>';print_r($_SESSION);echo'</pre>';

// Vider une partie de la session en cours :
unset($_SESSION['mdp']);    // nous pouvons supprimer une partie de la session avec unset();

echo '<br>2- La session après suppression du mdp';
echo '<pre>';print_r($_SESSION);echo'</pre>';

// Suppression totale d'une session
// session_destroy();  // Suppression de la session Mais le session_destroy() ne s'exécute qu'à la fin du script.

echo '<br>3- La session après suppression totale';
echo '<pre>';print_r($_SESSION);echo'</pre>';   // Ici on voit encore le contenu de la session car la suppression
                                                // n'intervient qu'à la fin du script. Le fichier du script (sur le
                                                // serveur) lui, a été supprimé.
