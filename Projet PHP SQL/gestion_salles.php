<?php
    require_once ('inc/haut.inc.php');

    function requete_vue_3 ($page,$table) {
        GLOBAL $pdo;
        $reponse = '';
        $page = $page*3 - 3;
        $r = $pdo->query("SELECT * FROM $table LIMIT $page,3");
        while ($rep = $r->fetch(PDO::FETCH_ASSOC)){
            $reponse .='<tr>';
            foreach ($rep as $valeur){
                $reponse .= '<td>'.$valeur.'</td>';
            }
            $reponse .= '<td><a</td></tr>';
        }
        return $reponse;
    }

    if (!empty($_GET['page'])){
        $_GET['page'] = (int)$_GET['page'];
    }

    $r = $pdo->query("SELECT * FROM salle"); 

    $nb_salles = $r->rowCount();;
    $nb_pages = ($nb_salles%3)>0?floor($nb_salles/3)+1:$nb_salles/3;

    if ($_GET['page'] <= 0 || $_GET['page'] > $nb_pages) {
        $erreur = true;
    }

    if (empty($erreur)){
            $message .= '<table><tr>';
            for ($i=0;$i<$r->columnCount();$i++){
                $col = $r->getColumnMeta($i);
                $message .= '<th>'.$col['name'].'</th>';
            }     
            $message .= '<th>Action</th></tr>';
            $message .= requete_vue_3($_GET['page'],'salle');
            $message .= '</table><ul class="menu_horizontal">';
            for($i=0;$i<$nb_pages;$i++){
                $message .= '<li><a href="?page='.($i+1).'">Page '.($i+1).'</a></li>';
            }
    } else {
            $message .= '<table><tr>';
            for ($i=0;$i<$r->columnCount();$i++){
                $col = $r->getColumnMeta($i);
                $message .= '<th>'.$col['name'].'</th>';
            }     
            $message .= '<th>Action</th></tr>';
            $message .= requete_vue_3(1,'salle');
            $message .= '</table><ul class="menu_horizontal">';
            for($i=0;$i<$nb_pages;$i++){
                $message .= '<li><a href="?page='.($i+1).'">Page '.($i+1).'</a></li>';
            }        

    }

    echo $message;

    require_once('inc/bas.inc.php');