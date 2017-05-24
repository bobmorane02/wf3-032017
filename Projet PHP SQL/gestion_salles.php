<?php
    require_once ('inc/haut.inc.php');

    function requete_vue_3 ($page,$table) {
        GLOBAL $pdo;
        $reponse = '';
        $page = $page*3 - 3;
        $r = $pdo->query("SELECT * FROM $table LIMIT $page,3");
        $nb_lignes = $r->rowCount();
        while ($rep = $r->fetch(PDO::FETCH_ASSOC)){
            $reponse .='<tr>';
            foreach ($rep as $index => $valeur){
                if ($index == 'description'){
                        $valeur = substr($valeur,0,10).'...';
                    } 
                    $reponse .= '<td>'.$valeur.'</td>';
                }
            $reponse .= '<td>
                         <i class="fa fa-search" aria-hidden="true"></i>
                         <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                         <i class="fa fa-trash-o" aria-hidden="true"></i>
                         </td></tr>';
            }
            if ($nb_lignes<3){
                $reponse .= '<tr>';
                for($i=0;$i<$r->columnCount();$i++){
                    $reponse .= '<td></td>';
                }
                $reponse .= '<td></td></tr>';
            }
            return $reponse;
        }
        
    if (!isset($_GET['page'])){
        $erreur = true;
    }

    if ( !$erreur && !empty($_GET['page'])){
        $_GET['page'] = (int)$_GET['page'];
    }

    $r = $pdo->query("SELECT * FROM salle"); 

    $nb_salles = $r->rowCount();;
    $nb_pages = ($nb_salles%3)>0?floor($nb_salles/3)+1:$nb_salles/3;

    if ( !$erreur && ($_GET['page'] <= 0 || $_GET['page'] > $nb_pages)) {
        $erreur = true;
    }

    if (!$erreur){
            $message .= '<table><tr>';
            for ($i=0;$i<$r->columnCount();$i++){
                $col = $r->getColumnMeta($i);
                $message .= '<th>'.$col['name'].'</th>';
            }     
            $message .= '<th>Action</th></tr>';
            $message .= requete_vue_3($_GET['page'],'salle');
            $message .= '</table><ul class="menu_horizontal">';
            for($i=0;$i<$nb_pages;$i++){
                $message .= '<li><a href="?page='.($i+1).'">Page '.($i+1).'</a></li>';
            }
    } else {
            $message .= '<table><tr>';
            for ($i=0;$i<$r->columnCount();$i++){
                $col = $r->getColumnMeta($i);
                $message .= '<th>'.$col['name'].'</th>';
            }     
            $message .= '<th>Action</th></tr>';
            $message .= requete_vue_3(1,'salle');
            $message .= '</table><ul class="menu_horizontal">';
            for($i=0;$i<$nb_pages;$i++){
                $message .= '<li><a href="?page='.($i+1).'">Page '.($i+1).'</a></li>';
            }        

    }

    echo $message;
?>
<form action="">
    <fieldset>
        <label for="titre">Titre</label>
        <input type="text" name="titre" id="titre" placeholder="Titre de la saisie">
        <label for="description">Description</label>
        <textarea name="description" id="description" placeholder="Description de la saisie"></textarea>
        <label for="photo">Photo</label>
        <input type="file" name="photo" id="photo">
        <label for="capacite">Capacité</label>
        <select name="capacite" id="capacite">
            <?php
                for ($i=1;$i<=1000;$i++){
                    echo '<option value="'.$i.'">'.$i.'</option>';
                }
            ?>
        </select>
        <label for="categorie">Catégorie</label>
        <select name="categorie" id="categorie">
        <?php
            $r = $pdo->query("SHOW COLUMNS FROM salle LIKE 'categorie'");
            $rep = $r->fetch(PDO::FETCH_ASSOC);
            $a = explode("','",preg_replace("/(enum)\('(.+?)'\)/","\\2", $rep['Type']));
            foreach ($a as $valeur){
                echo '<option value="'.$valeur.'">'.ucfirst($valeur).'</option>';
            }
        ?>    
        </select>
    </fieldset>
    <fieldset>
        <label for="pays">Pays</label>
        <select name="pays" id="pays">
            <option value="france">France</option>
            <option value="angleterre">Angleterre</option>
            <option value="allemagne">Allemagne</option>
            <option value="italie">Italie</option>
            <option value="espagne">Espagne</option>
        </select>
        <label for="ville">Catégorie</label>
        <select name="ville" id="ville">
            <option value="paris">Paris</option>
            <option value="lyon">Lyon</option>
            <option value="marseille">Marseille</option>
        </select>
        <label for="adresse">Adresse</label>
        <textarea name="adresse" id="adresse" placeholder="Adresse de la salle"></textarea>
        <label for="cp">Code postal</label>
        <input type="text" id="cp" name="cp" placeholder="Code postalde la salle">
        <input type="submit" value="Enregistrer">
    </fieldset>
</form>


<?php
    require_once('inc/bas.inc.php');