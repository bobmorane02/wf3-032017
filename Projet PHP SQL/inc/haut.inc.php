<?php
    require_once ('init.inc.php');

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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">    
    <link rel="stylesheet" href="css/style.css">
    <title>Sallea</title>
</head>
<body>
    <header>
        <div class="container">
            <nav class="navbar navbar-default navbar-collapse">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">SalleA</a>
                </div>
                <ul class="nav navbar-nav">
                    <li><a href="#">Qui sommes nous</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> Espace Membre</a>
                        <ul class="dropdown-menu">
                            <?php
                                $fichier = file_get_contents($menu);
                                $json = json_decode($fichier,true);
                                foreach ($json as $valeur){
                                    echo '<li><a href="#">'.$valeur.'</a></li>';
                                }
                            ?>
                        </ul>  
                    </li>
                </ul>
            </nav>
        
        <!--<section>
            <ul>
                <li><a href="#"><h1>Sallea</h1></a></li>
                <li><a href="#">Qui Sommes Nous</a></li>
                <li><a href="#">Contact</a></li>
                <li>
                    Espace Membre
                    <ul id="menu"><?php/*
                            $fichier = file_get_contents($menu);
                            $json = json_decode($fichier,true);
                            foreach ($json as $index => $valeur) {
                                echo '<li id="'.$index.'">'.$valeur.'</li>';
                            }
                        */?>
                    </ul>
                </li>
            </ul>
        </section>-->
    </header>
    <main>