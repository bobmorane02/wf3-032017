<?php

/*  Exercice :

    1- Réaliser un formulaire permettant de selectionner un fruit dans un selecteur, et de
       saisir un poids quelconque exprimé en grammes.
    2- Faire un traitement du formulaire pour afficher le prix du fruit choisi selon le poids
       indiqué, en passant par la fonction calcul.
    3- Faire en sorte de garder le fruit choisi et le poids saisi dans les champs du formulaire
       après que celui-ci soit validé.
*/

require_once ('fonction.inc.php');
?>

<form method="post" action="">
    <label for="fruit">Fruits</label>
    <select name="fruit" id="fruit">
        <option value="">-- Choisir--</option>
        <option value="cerises">Cerises</option>
        <option value="bananes">Bananes</option>
        <option value="pommes">Pommes</option>
        <option value="peches">Pêches</option>    
    </select>
    <br>
    <label for="poids">Poids</label>
    <input type="number" id="poids" name="poids"><br>
<input type="submit" value="Valider">
</form>
<p>
<?php
    if(!empty($_POST)){
       // echo 'test';
        var_dump($_POST);
    }
?>
</p>