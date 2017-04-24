<?php
    /*
    Exercice : créer le formulaire indiqué au tableau, récupérer les données saisies et les afficher
    dans la même page
    */

    if (!empty($_POST)){
        echo "Ville : $_POST[ville]</br>Code Postal : $_POST[codePostal]<br>Adresse : $_POST[adresse]<br>";        
    }

?>
<h1>Formulaire 2</h1>
<form method="post" action="">
    <label for="ville">Ville</label>
    <input type="text" id="ville" name="ville"><br>
    <label for="codePostal">Code Postal</label>
    <input type="number" id="codePostal" name="codePostal"><br>
    <label for="adresse">Adresse</label>
    <textarea id="adresse" name="adresse" cols="30" rows="10"></textarea>
    <input type="submit" name="valider" value="valider">
</form>
