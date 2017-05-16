<!-- faire une page avec un champ select qui permet de choisir un prénom
     mettre en place une requete ajax qui récupére le prénom choisi pour
     le passer dans la page -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
        body {
            max-width: 700px;
            margin: auto;
        }
        table {
            border-collapse: collapse;
        }

        td {
            padding: 10px;
            height: 40px;
        }

        select {
            margin: 10px 0;
            height: 50px;
        }

        label,select {
            width: 100%;
        }

    </style>    
    
    <title>Document</title>
</head>
<body>
    <label for="prenom">Choisir un prénom</label>
    <select name="prenom" id="prenom">
        <?php
            $fichier = file_get_contents('fichier.json');
            $json = json_decode($fichier,true);
            foreach ($json as $valeur) {
                echo "<option>$valeur[prenom]</option>";
            }
        ?>
    </select>
    <div id="resultat"></div>
    <hr>
    <!--<button type="button" id="button" onclick="ajax();">Consulter les informations</button>-->

    <script>
        ajax(document.getElementById('prenom').value);
        document.getElementById('prenom').addEventListener("change",function(){
            ajax(this.value);
        });
        
        function ajax(personne) {
            var file = 'ajax.php'; // La page cible
            r = new XMLHttpRequest();
            var parametres = 'prenom='+personne;

            r.open('POST',file,true); // préparation 
            r.setRequestHeader('Content-type','application/x-www-form-urlencoded');

            r.onreadystatechange = function () {
                if (r.readyState == 4 && r.status == 200) {
   //                 console.log(r.responseText);
                    var obj = JSON.parse(r.responseText);
                    document.getElementById('resultat').innerHTML = obj.resultat;
                }
            }

            r.send(parametres); // envoi
        }
    </script>
</body>
</html>