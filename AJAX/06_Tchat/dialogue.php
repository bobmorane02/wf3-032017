<?php
    require_once("inc/init.inc.php");
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="conteneur">
        <h2 id="moi">Bonjour <?php echo $_SESSION['pseudo']; ?></h2>
        <div id="message_tchat"></div>
        <div id="liste_membre_connecte"></div>
        <div class="clear"></div>
        <div id="smiley">
            <img src="smil/smiley1.gif" alt=":)">
        </div>
        <!-- Formulaire -->
        <div id="formulaire_tchat">
            <form id="form">
                <textarea name="message" id="message" rows="5" maxlength="300"></textarea><br>
                <input type="submit" name="envoi" value="envoi" class="submit">
            </form>
        </div>
        <div id="postMessage"></div>
    </div>
    <script>

        // ajax('message_tchat');
        // pour récupérer la liste des membres connectés
        setInterval(ajax('liste_membre_connecte',1000));

        // déclaration de la fonction ajax().
        function ajax(mode,arg = ''){

            if (typeof(mode) == 'object') {
                mode = mode.id; // l'argument mode recevra les id des differents elements de notre page.
                                // Sachant que l'on peut séléctionner des elements html directeur par leur
                                // id (sans getElementById...) il y a un risque de récupérer un objet représentant 
                                // l'élément html. Dans ce cas nous récupérons juste l'id de l'élément (mode = mode.id)
            }

            console.log("mode actuel: "+mode); // nous affichons la tache en cours dans la console

            var file = "ajax_dialogue.php";
            var parametres = "mode="+mode+"&arg="+arg

            if (window.XMLHttpRequest) {
                var xhttp = new XMLHttpRequest();
            } else {
                var xhttp = new ActiveXObject("Microsoft.XMLHTTP"); // IE < 7
            }

            xhttp.open("POST",file,true);
            xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');

            xhttp.onreadystatechange = function() {
                if (xhttp.readyState == 4 && xhttp.status == 200) {
                        console.log(xhttp.responseText);
                    var obj = JSON.parse(xhttp.responseText);

                    document.getElementById(mode).innerHTML = obj.resultat;
                    var boiteMessage = document.getElementById("message_tchat");
                    document.getElementById(mode).scrollTop = boiteMessage.scrollHeight;
                    // permet de descendre l'ascenceur du div et de voir les derniers messages.
                }
            }
            xhttp.send(parametres);
        }
    </script>
</body>
</html>
