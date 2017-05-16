<?php
// nous avons besoin d'un language interprété coté serveur pour pouvoir communiquer.

$prenom = isset($_POST['prenom'])?$_POST['prenom']:''; // On récupére l'argument fourni via post

$tab = array(); // on prépare le tableau array qui contiendra la réponse.

$fichier = file_get_contents('fichier.json'); // on récupére le contenu de fichier.json
$json = json_decode($fichier,true); // on transforme en array représenté par la variable $json

foreach ($json as $valeur) {
    if ($valeur['prenom'] == strtolower($prenom)) {
        $tab['resultat'] = '<table border="1"><tr>';
        foreach($valeur as $information) {
            $tab['resultat'] .= '<td>'.$information.'</td>';
        }
        $tab['resultat'] .= '</tr></table>';
    }
}

echo json_encode($tab); // la réponse