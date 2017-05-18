<?php
    require_once("inc/init.inc.php");

    require_once("inc/header.inc.php");
    // require_once("inc/nav.inc.php"); // pour charger une eventuelle nav
?>
    <div class="container">
        <div class="col-sm-6 col-sm-offset-3" id="enregistrer"></div>

        <div class="col-sm-6 col-sm-offset-3">
            <h1>
                <span class="glyphicon glyphicon-user" ></span>
                &nbsp;Enregistrer un article
            </h1>
            <form action="ajax.php" id="form">
                <div class="form-group">
                    <label for="titre">Titre</label>
                    <input type="text" class="form-control" name="titre" id="titre">
                </div>
                <div class="form-group">
                    <label for="auteur">Auteur</label>
                    <input type="text" class="form-control" name="auteur" id="auteur">
                </div>
                <div class="form-group">
                    <label for="contenu">Contenu</label>
                    <textarea class="form-control" name="contenu" id="contenu"></textarea>
                </div>
                <button type="submit" class="button button-success col-sm-12">Enregistrer</button>
            </form>
        </div>
        <div class="col-sm-6 col-sm-offset-3">
            <h1>
                <span class="glyphicon glyphicon-list" style="color: lightslategray" ></span>
                &nbsp;Liste des article
            </h1> 
            <hr>              
        </div>
        <div class="col-sm-12" id="liste"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<?php
    require_once("inc/footer.inc.php");
?>
