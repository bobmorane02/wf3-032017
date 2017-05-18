<?php
    $pdo = new PDO('mysql:host=localhost;dbname=entreprise','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

    $parametre = isset($_POST['id'])?(int)$_POST['id']:1;

    $r = $pdo->query("SELECT * FROM employes WHERE id_employes = $_POST[id]");
    $rep = $r->fetch(PDO::FETCH_ASSOC);

    $reponse['resultat'] = '<table border="1"><tr>';
    $reponse['resultat'] .= '<th>'.implode('</th><th>',array_keys($rep)).'</th></tr><tr>';
    foreach ($rep as $valeur) {
        $reponse['resultat'].= '<td>'.$valeur.'</td>';
    }
    $reponse['resultat'] .= '</tr></table>';

    echo json_encode($reponse);


