<?php
    require_once ('inc/init.inc.php');

    $resultat = array();
    $resultat['reponse'] = '';

    $r = $pdo->query("SELECT * FROM salle ORDER BY titre ASC LIMIT 0,3");

    $resultat['reponse'] .= '<table><tr>';
    
    for ($i=0;$i<$r->columnCount();$i++){
        $colonne = $r->getColumnMeta($i);
        $resultat['reponse'] .= '<th>'.$colonne['name'].'</th>';
    }
    $resultat['reponse'] .= '<th>Action</th>';
    $resultat['reponse'] .= '</tr></table>';

    echo json_encode($r->getColumnMeta());
