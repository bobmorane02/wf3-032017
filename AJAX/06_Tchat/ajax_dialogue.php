<?php
require_once("inc/init.inc.php");

$tab = array();
$tab['resultat'] = '';
$mode = isset($_POST['mode'])?$_POST['mode']:'';
$arg = isset($_POST['arg'])?$_POST['arg']:'';

if ($mode == 'liste_membre_connecte' && empty($arg)) {
    $utilisateur_connectes = file('prenom.txt');
    foreach ($utilisateur_connectes as $valeur){
        $tab['resultat'] .= '<p>'.$valeur.'</p>';
    }
} elseif ($mode == 'postMessage') {
    // on test s'il y a bien un message à enregistrer
    $arg = trim($arg);  // on enléve les espaces avant et aprés la chaine ainsi que si elle est composée d'espace
    if(!empty($arg)){   //si le message n'est pas vide, on l'enregistre
        $position = strpos($arg,">");
        $arg = substr($arg,$position);
        $arg = addslashes($arg); // Utilisation des ' et "
        // enregistrement du message
        $pdo->query("INSERT INTO dialogue (id_membre,message,date) VALUES ($_SESSION[id_membre],'$arg',NOW())");
        $tab['resultat'] = "Message enregistré !";
    }
} elseif ($mode == 'message_tchat'){
    // recupérer tous les messages de la table dialogue
    // traitement de l'objet résultat avec un while pour placer la reponse dans $tab['resultat'] au format "pseudo > message"

    $reponse = $pdo->query("SELECT d.message,m.pseudo,m.civilite FROM dialogue d INNER JOIN membre m WHERE d.id_membre = m.id_membre ORDER BY d.date ASC");
    while ($rep = $reponse->fetch(PDO::FETCH_ASSOC)) {
        switch ($rep['civilite']) {
            case 'm' : $class = ' class="bleu"';break;
            default : $class = ' class="rose"';
        }
        $tab['resultat'] .= '<p'.$class.'>'.$rep['pseudo'].' > '.$rep['message'].'</p>';
    }
} elseif ($mode == 'liste_membre_connecte' && !empty($arg)) {
    // si $arg n'est pas vide alors on a un pseudo et nous devons le retirer du fichier prenom.
    $contenu = file_get_contents('prenom.txt'); // on récupére le contenu du fichier prenom.txt dans la variable $contenu
    $contenu = str_replace($arg."\n","",$contenu); // remplace le pseudo recherché par rien
    file_put_contents('prenom.txt',$contenu); // on écrase l'ancien contenu par le nouveau sans le pseudo
}

echo json_encode($tab);