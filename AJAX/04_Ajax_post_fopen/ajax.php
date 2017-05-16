<?php

    $email ='';
    $email = isset($_POST['email'])?$_POST['email']:'';

    /* Création ou ouverture d'un fichier via la fonction fopen en mode a 
    php crée le fichier s'il n'existe pas sinon il l'ouvre.
    */
    if(filter_var($email,FILTER_VALIDATE_EMAIL)) {

        $f = fopen('email.txt','a');
        fwrite($f,$email."\n"); // \n doit étre entre "" sinon il ne sera pas interprété.

        $tab = array();
        $tab['resultat'] = '<h2>Confirmation de l\'inscription</h2>';

        $liste = file('email.txt'); // La fonction file() place chaque ligne du fichier préciséen argument dans un array.

        $tab['resultat'] .= '<p>Voici la liste de tous les inscrits</p>';

        $tab['resultat'] .= '<ul>';
        foreach ($liste as $valeur) {
            $tab['resultat'] .= '<li>'.$valeur.'</li>';
        }

        $tab['resultat'] .= '</ul>';

        echo json_encode($tab);
    } else {
        $tab['resultat'] .= '<p>Email non valide</p>';
        echo json_encode($tab);
    }