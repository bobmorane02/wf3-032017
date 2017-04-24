<?php
/*  Exercice :
    - Faire 4 liens HTML avec le nom des fruits
    - Quand on click sur un lien, on affiche le prix pour 1000gr pour ce fruit cette page
      page lien_fruits.php. */

require_once ('fonction.inc.php');
?>

<h1>Prix des Fruits</h1>
<br>
<a href="?fruit=bananes">Bananes</a><br>
<a href="?fruit=cerises">Cerises</a><br>
<a href="?fruit=pommes">Pommes</a><br>
<a href="?fruit=peches">Pêches</a>
<br>
<p><?php
    if(isset($_GET['fruit'])){
        echo calcul($_GET['fruit'],1000);
    }
   ?>
</p>
