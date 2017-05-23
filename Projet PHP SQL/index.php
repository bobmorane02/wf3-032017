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
                            foreach ($json as $valeur) {
                                echo '<li id="'.strtolower($valeur).'">'.$valeur.'</li>';
                            }
                        ?>
                    </ul>
                </li>
            </ul>
        </section>
    </header>
    <main>
        <section>
            <aside>
                <div>
                    <h4>Catégorie</h4>
                    <button>Reunion</button>
                    <button>Bureau</button>
                    <button>Formation</button>
                </div>
                <div>
                    <h4>Ville</h4>
                    <button>Paris</button>
                    <button>Lyon</button>
                    <button>Marseille</button>
                </div>
                <div>
                    <h4>Capacité</h4>
                    <select name="capacite" id="capatite">
                        <option value="3">3</option>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div>
                    <h4>Prix</h4>
                </div>
                <div>
                    <h4>Période</h4>
                    <label for="arrivee">Date d'arrivée</label>
                    <input id="arrivee" type="date" name="arrivee">
                    <label for="depart">Date d'arrivée</label>
                    <input id="depart" type="date" name="depart">
                </div>                   
            </aside>
        </section>
        <section id="corp"></section>
    </main>
    <footer>
        <div id="modale"></div>
    </footer>
    <script src="js/script.js"></script>
</body>
</html>