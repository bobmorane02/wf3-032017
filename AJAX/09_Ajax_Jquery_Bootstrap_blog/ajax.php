<?php
require_once('inc/init.inc.php');

$tab = array();
$tab['resultat'] = "";

$mode = isset($_POST['mode'])?$_POST['mode']:"";

if($mode == 'enregistrer'){
    if(!empty($_POST['titre']) && !empty($_POST['auteur']) && !empty($_POST['contenu'])) {
        $resultat = $pdo->prepare("INSERT INTO article (titre,auteur,contenu,date) VALUES (:titre,:auteur,:contenu,NOW())");
        $resultat->bindParam(':titre',$_POST['titre'],PDO::PARAM_STR);
        $resultat->bindParam(':auteur',$_POST['auteur'],PDO::PARAM_STR);
        $resultat->bindParam(':contenu',$_POST['contenu'],PDO::PARAM_STR);
        $resultat->execute();
        $tab['resultat'] .= '<div class="alert alert-success" role="alert">Article enregistré</div>';
    }
} elseif ($mode == 'liste') {
    // récupérer tous les articles et les placer dans $tab['resultat']
    // mettre en place une fonction ajax qui envoie l'argument mode=liste et qui
    // affiche tous les articles dans l'élément avec l'id liste => setInterval
}

echo json_encode($tab);