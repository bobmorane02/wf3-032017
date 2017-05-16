<?php
    $pdo = new PDO('mysql:host=localhost;dbname=entreprise','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $r = $pdo->query("SELECT prenom,id_employes FROM employes");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <style>
        body {
            max-width: 700px;
            margin: auto;
        }
        table {
            border-collapse: collapse;
            border: none;
        }

        td,th {
            padding: 10px;
            height: 40px;
        }

        select,input {
            margin: 10px 0;
            height: 40px;
            border-radius: 5px;
        }

        label,select,input,table {
            width: 100%;
        }

        #resultat {
            background-color: #dadada;
            border-radius: 10px;
            overflow: hidden;
        }

    </style>        
</head>
<body>
    <form id="mon_form">
        <label>Prénom</label>
        <select id="choix">
            <?php
                // récupérer tous les prénoms présentdans la BDD entreprisesur la table employés et mettre l'id_employes dans la value
                while ($rep = $r->fetch(PDO::FETCH_ASSOC)){
                    echo '<option value='.$rep['id_employes'].'>'.$rep['prenom'].'</option>';
                }
            ?>
        </select>
        <br>
        <input type="submit" id="valider" value="Valider" />
    </form>
    <hr>
    <div id="resultat"></div>
    <script>
        /*  Mettre en place un événement sur la validation du formulaire (submit) bloquer le rechargement de page consécutif à la validation
            du formulaire et déclencher une requête ajax qui envoie sur ajax.php
            sur ajax.php récupérer les informations de l'employé correspondant à l'id récupérée et envoyer une réponse sous forme de tableau html.
            Le tableau doit avoir deux lignes, une avec les noms des colonnes et l'autre avec les valeurs.
        */
        
        document.getElementById('valider').addEventListener("click",function(e){
            e.preventDefault();
            var valeur = document.getElementById('choix');
            ajax(valeur.value);
        });

        function ajax(id) {
            var file = 'ajax.php';
            r = new XMLHttpRequest();
            var parametres = 'id='+id;

            r.open('POST',file,true); // préparation 
            r.setRequestHeader('Content-type','application/x-www-form-urlencoded');

            r.onreadystatechange = function () {
                if (r.readyState == 4 && r.status == 200) {
                    var obj = JSON.parse(r.responseText);
                    document.getElementById('resultat').innerHTML = obj.resultat;
                }
            }

            r.send(parametres); // envoi
        }

    </script>
</body>
</html>