<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">  
        <h1>Employés</h1>
        <div id="tableau_employes"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        // mise en place d'un timer javascript :
        setInterval("ajax()",5000); // 2 arguments => la fonction à exécuter, le timer en millisecondes

        function ajax() {
            var r = new XMLHttpRequest();
            r.open('GET','ajax.php',true);

            r.onreadystatechange = function() {
                if(r.readyState == 4 && r.status == 200 ){
                    document.getElementById('tableau_employes').innerHTML = JSON.parse(r.responseText).resultat;
                }
            }
            r.send();
        }

    </script>
  </body>
</html>