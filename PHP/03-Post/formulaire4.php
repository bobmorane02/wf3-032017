<?php
    /*  Exercice : réaliser un formulaire "pseudo" et "email" dans formulaire3.php, en récupérant et
        affichant les informations dans formulaire4.php

        De plus, une fois le formulaire soumis, vous vérifiez que le pseudo n'est pas vide. Si tel
        est le cas, affichez un message d'erreur à l'internaute (dans formulaire4.php)
   
    */

if (!empty($_POST)){
    echo $rep = empty($_POST['pseudo'])?'Pseudo vide !!!':"Pseudo : $_POST[pseudo]";
} else {
    echo 'Formulaire vide !';
}