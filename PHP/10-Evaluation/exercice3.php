<?php
// -------------------------------------------- Traitement ------------------------------------------------
$message ='';   // Initialisation de la variable d'affichage'
$langue = array('français','anglais','allemand','italien','espagnol','chinois');
$categorie = array('comedie','sf','aventure','western','action');

if ($_POST) {
    if (empty($_POST['title']) || strlen($_POST['title']) < 5) {
        $message .= '<div class="erreur">Titre non valide</div>';
    }
    if (empty($_POST['actors']) || strlen($_POST['actors']) < 5) {
        $message .= '<div class="erreur">Acteur(s) non valide(s)</div>';
    }
    if (empty($_POST['director']) || strlen($_POST['director']) < 5) {
        $message .= '<div class="erreur">Réalisateur non valide</div>';
    }
    if (empty($_POST['producer']) || strlen($_POST['producer']) < 5) {
        $message .= '<div class="erreur">Producteur non valide</div>';
    }
    if (empty($_POST['storyline']) || strlen($_POST['storyline']) < 5) {
        $message .= '<div class="erreur">Synopsis non valide</div>';
    }
    if (empty($_POST['year_of_prod']) || $_POST['year_of_prod'] > date('Y') || $_POST['year_of_prod'] < date('Y')-100) {
        $message .= '<div class="erreur">Année de production non valide</div>';
    }
    if (empty($_POST['language']) || !in_array($_POST['language'],$langue)) {
        $message .= '<div class="erreur">Langue non valide</div>';
    }
    if (empty($_POST['category']) || !in_array($_POST['category'],$categorie)) {
        $message .= '<div class="erreur">Catégorie non valide</div>';
    }
    if (!filter_var($_POST['video'],FILTER_VALIDATE_URL)){
        $message .= '<div class="erreur">Lien vers la bande annonce non valide</div>';        
    }
    

}









// -------------------------------------------- Affichage  ------------------------------------------------
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <style>
        .erreur : {
            color:red;
        }
    </style>
    <form method="post" action="">
        <div><label for="title">Titre</label></div>
        <div><input type="text" name="title" id="title"></div>
        <div><label for="actors">Acteurs</label></div>
        <div><input type="text" name="actors" id="actors"></div>
        <div><label for="director">Directeur</label></div>
        <div><input type="text" name="director" id="director"></div>
        <div><label for="producer">Producteur</label></div>
        <div><input type="text" name="producer" id="producer"></div>
        <div><label for="actors">Acteurs</label></div>
        <div><input type="text" name="actors" id="actors"></div>        
        <div><label for="year_of_prod">Année de production</label></div>
        <div><select name="year_of_prod" id="year_of_prod">
                <?php
                    for ($i=date('Y');$i>=date('Y')-100;$i--){
                        echo "<option value=$i>$i</option>";
                    }
                ?>
            </select></div>
        <div><label for="language">Langue</label></div>
        <div><select name="language" id="language">
                <?php
                    foreach ($langue as $valeur) {
                        echo "<option value=$valeur>$valeur</option>";
                    }
                ?>
            </select></div>
        <div><label for="category">Categorie</label></div>
        <div><select name="category" id="category"></div>
                <?php
                    foreach ($categorie as $valeur) {
                        echo "<option value=$valeur>$valeur</option>";
                    }
                ?>
            </select></div>
        <div><label for="storyline">Synopsis</label></div>
        <div><textarea name="storyline" id="storyline" cols="30" rows="10"></textarea></div>
        <div><label for="video">Lien vers la bande annonce</label></div>
        <div><input type="text" name="video" id="video"></div>
        <p><input type="submit" value="Enregistrer le film"></p>
    </form>
    <?php echo $message; ?>
</body>
</html>
