<?php
    $mysqli = new mysqli("localhost","root","","repertoire");
    
    $data =[];
    if (isset($_POST['inscription'])){
        #echo '<pre>';print_r($_POST);echo '</pre>';
        
        foreach ($_POST as $index => $valeur){
            $data[$index]=$valeur;
        }
    }
    $date_de_naissance = $_POST['annee'].'-'.$_POST['mois'].'-'.$_POST['jour'];
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Repertoire</title>
        <style>
            label,input,textarea,select {
                display: block;
                width: 100%;
            }
            
            .container {
                width :300px;
            }       
            
            .sexe{
                width: initial;
                display: inline;
            }
        </style>
    </head>
    <body>
        
        <div class="container">
            <form method="post" action="">
                <fieldset>
                    <legend>Informations</legend>
                    <label for="nom">Nom</label>
                    <input id="nom" name="nom" type="text">

                    <label for="prenom">Prénom</label>
                    <input id="prenom" name="prenom" type="text">

                    <label for="telephone">Téléphone</label>
                    <input id="telephone" name="telephone" type="text">

                    <label for="profession">Profession</label>
                    <input id="profession" name="profession" type="text">

                    <label for="ville">Ville</label>
                    <input id="ville" name="ville" type="text">

                    <label for="cp">Code postal</label>
                    <input id="cp" name="codepostal" type="text">

                    <label for="adresse">Adresse</label>
                    <textarea id="adresse" name="adresse" cols="30" rows="5"></textarea>
                    <hr>
                    <legend>Informations supplémentaires</legend>
                    <label>Date de naissance</label>
                    <label for="jour">Jour</label>
                    <select id="jour" name="jour" id="jour">
                        <?php
                            for ($i=1;$i<=31;$i++){
                                if ($i<=9){
                                    echo '<option value="'.$i.'">0'.$i.'</option>';
                                } else {
                                    echo '<option value="'.$i.'">'.$i.'</option>';
                                }
                            }
                        ?>
                    </select>
                    <label for="mois">Mois</label>
                    <select name="mois" id="mois">
                        <option value="1">Janvier</option>
                        <option value="2">Février</option>
                        <option value="3">Mars</option>
                        <option value="4">Avril</option>
                        <option value="5">Mai</option>
                        <option value="6">Juin</option>
                        <option value="7">Juillet</option>
                        <option value="8">Août</option>
                        <option value="9">Septembre</option>
                        <option value="10">Octobre</option>
                        <option value="11">Novembre</option>
                        <option value="12">Décembre</option>
                    </select>
                    <label for="annee">Année</label>
                    <select name="annee" id="annee">
                        <?php
                            for ($i= date("Y");$i >= 1930;$i--){
                                echo '<option value="'.$i.'">'.$i.'</option>';
                            }                    
                        ?>
                    </select>
                    <fieldset>
                        <legend>Sexe</legend>
                        <input class="sexe" type="radio" name="sexe" value="m" checked>Homme
                        <input class="sexe" type="radio" name="sexe" value="f">Femme
                    </fieldset>
                    <label for="description">Description</label>
                    <textarea name="description" id="description" name="description" cols="30" rows="10"></textarea>
                    <input type="submit" name="inscription" value="inscription">
                </fieldset>
            </form>
        </div>
    </body>
</html>