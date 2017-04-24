<?php
// ********************************************
// La superglobale $_POST
// ********************************************
// $_POST est une superglobale, et donc un array disponible dans tous les contextes du
// script.

// C'est une méthode qui permet de récupérer des informations issues d'un formulaire

// Un formulaire est obligatoirement dans des balises <form></form>, avec la désignation
// des attributs method (pour get ou post) et action (qui indique le fichier de destination
// des données du formulaire)

// Les attributs name du formulaire constituent les indices de l'array $_POST de récéption
// Les données saisies dans les champs constituent les valeurs correspondantes.


// print_r($_POST);

if(!empty($_POST)){ // not empty signifie que l'array $_POST autrement dit que le formulaire
                    // à été posté. Il peut cependant avoir été posté avec des champs vides :
                    // les valeurs de l'array $_POST sont vides MAIS il y a bien les indices
                    // "prenom" et "desciption" à l'intérieur
                    
echo 'Prénom : '.$_POST['prenom'].'<br>';
echo 'Description : '.$_POST['description'].'<br>';
}

?>

<h1>Formulaire</h1>
<form method="post" action="">
    <label for="prenom">Prénom</label>
    <input type="text" id="prenom" name="prenom"><br>

    <label for="description">Description</label>
    <textarea name="description" id="description"></textarea><br>

    <input type="submit" name="validation" value="envoyer">

</form>