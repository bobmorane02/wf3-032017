<?php
    require_once("inc/init.inc.php");
    if (empty($_SESSION['pseudo'])){
        // si l'utilisateur est défa connecté, on le redirige vers dialogue.php
        header("location:index.php");
    }
    
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
        console.log('<?php echo $_SESSION['pseudo']; ?>');
        // faire en sorte que si l'utilisateur appuie sur "entrée" on enregistre le message
        document.addEventListener("keydown", function(e){
            if(e.keyCode == 13) {
                e.preventDefault();
                var messageValeur =  document.getElementById("message").value;
                ajax("postMessage",messageValeur);
                ajax("message_tchat");
                document.getElementById("message").value = "";
            }
        });

        // ajout de :) dans le message lors du clic sur le smiley
        document.getElementById("smiley").addEventListener("click",function(e){
            document.getElementById("message").value = document.getElementById("message").value+e.target.alt;
            document.getElementById("message").focus(); // on remet le focus sur le message
        });
        // pour récupérer la liste des membres connectés
        ajax('liste_membre_connecte');

        setInterval("ajax('liste_membre_connecte')",3333);

        // rafraichissement des messages
        setInterval("ajax('message_tchat')",2000);

        // Enregistrement du message via le bouton submit
        document.getElementById('form').addEventListener("submit",function(e){
            e.preventDefault(); // on bloque le rechargement de page lors de la soumission
            // on récupére le message
            var messageValeur =  document.getElementById("message").value;
            // on exécute ajax() pour enregistrement
            ajax("postMessage",messageValeur);
            // on execute ajax() pour afficher les messages
            ajax("message_tchat");
            // on vide le champ
            document.getElementById("message").value = "";
        });

        // FERMETURE DE LA PAGE PAR UTILISATEUR
        // On le retire du fichier prenom.
        window.onbeforeunload = function() {
            ajax('liste_membre_connecte', '<?php echo $_SESSION['pseudo']; ?>');
        }
        // déclaration de la fonction ajax().
        function ajax(mode,arg = ''){

            if (typeof(mode) == 'object') {
                mode = mode.id; // l'argument mode recevra les id des differents elements de notre page.
                                // Sachant que l'on peut séléctionner des elements html directeur par leur
                                // id (sans getElementById...) il y a un risque de récupérer un objet représentant 
                                // l'élément html. Dans ce cas nous récupérons juste l'id de l'élément (mode = mode.id)
            }

            // console.log("mode actuel: "+mode); // nous affichons la tache en cours dans la console

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
                        // console.log(xhttp.responseText);
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
