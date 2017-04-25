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
if (!empty($_POST)){
    $reponse = calcul($_POST['fruit'],$_POST['poids']);
}
?>

<h1>Formulaire Fruits</h1>
<form method="post" action="">
    <label for="fruit">Fruits</label>
    <select name="fruit" id="fruit">
        <option value="">-- Choisir --</option>
        <option value="cerises" <?php if (isset($_POST['fruit']) && $_POST['fruit'] == 'cerises'){echo 'selected';} ?>>Cerises</option>
        <option value="bananes" <?php if (isset($_POST['fruit']) && $_POST['fruit'] == 'bananes'){echo 'selected';} ?>>Bananes</option>
        <option value="pommes" <?php if (isset($_POST['fruit']) && $_POST['fruit'] == 'pommes'){echo 'selected';} ?>>Pommes</option>
        <option value="peches" <?php if (isset($_POST['fruit']) && $_POST['fruit'] == 'peches'){echo 'selected';} ?>>Pêches</option>    
    </select>
    <label for="poids">Poids</label>
    <input type="number" id="poids" name="poids" placehorder="poids en grammes" value="<?php echo $_POST['poids'] ?? ''; ?>">
    <input type="submit" value="Valider">
</form>
<p>
<?php
if (!empty($_POST)){
    echo calcul($_POST['fruit'],$_POST['poids']);
}
?>
</p>