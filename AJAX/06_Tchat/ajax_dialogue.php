<?php

$tab = array();
$tab['resultat'] = '';
$mode = isset($_POST['mode'])?$_POST['mode']:'';

if ($mode == 'liste_membre_connecte') {
    $utilisateur_connectes = file('prenom.txt');
    foreach ($utilisateur_connectes as $valeur){
        $tab['resultat'] .= '<p>'.$valeur.'</p>';
    }
}

echo json_encode($tab);