<?php
    require_once ('inc/init.inc.php');

        if (empty($_SESSION['mode']) || !in_array($_SESSION['mode'],array(0,1)) || session_status() != PHP_SESSION_ACTIVE){
            $menu = 'json/menu_visiteur.json';
        } elseif ($_SESSION['mode'] == 0) {
            $menu = 'json/menu_membre.json';
        } else {
            $menu = 'json/menu_admin.json';
        }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Sallea</title>
</head>
<body>
    <header>
        <section>
            <ul>
                <li><a href="#"><h1>Sallea</h1></a></li>
                <li><a href="#">Qui Sommes Nous</a></li>
                <li><a href="#">Contact</a></li>
                <li>
                    Espace Membre
                    <ul id="menu"><?php
                            $fichier = file_get_contents($menu);
                            $json = json_decode($fichier,true);
                            foreach ($json as $index => $valeur) {
                                echo '<li id="'.$index.'">'.$valeur.'</li>';
                            }
                        ?>
                    </ul>
                </li>
            </ul>
        </section>
    </header>