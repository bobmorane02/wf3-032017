<?php
require_once('inc/init.inc.php');
// -------------------------------------------- TRAITEMENT --------------------------------------------
$aside = '';

// 1- Contrôler l'existence du produit demandé :
if (isset($_GET['id_produit'])) {   // si existe l'indice id_produit dans l'URL
// On requête en base le produit demandé pour vérifier son existence :
    $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = :id_produit",array(':id_produit'=>$_GET['id_produit']));

    if ($resultat->rowCount() <= 0) {
        header('location:boutique.php');    // s'il n'y a pas de résultat on réoriente vers la boutique
        exit();
    }

    // 2- Affichage du détail du produit :
    $produit = $resultat->fetch(PDO::FETCH_ASSOC);  // pas de while car 1 seul produit
    $contenu .= '<div class="row"
                    <div class="col-lg-12">
                        <h1 class="page-header">'.$produit['titre'].'</h1>
                    </div>
                </div>';
    $contenu .= '<div class="col-md-8">
                    <img class="img-responsive" src="'.$produit['photo'].'" alt="">
                 </div>';
    $contenu .= '<div class="col-md-4">
                    <h3>Description</h3>
                    <p>'.$produit['description'].'</p>
                    <h3>Détails</h3>
                    <ul>
                        <li>Catégorie : '.$produit['categorie'].'</li>
                        <li>Couleur : '.$produit['couleur'].'</li>
                        <li>Taille : '.$produit['taille'].'</li>
                    </ul>
                    <p class="lead">Prix : '.$produit['prix'].' €</p>
                 </div>';

    // 3- Affichage du formulaire d'jout au panier si stock > 0 :
    $contenu .= '<div class="col-md-4"';
        if ($produit['stock'] > 0) {
            // s'il y a du stock on met le bouton ajouter au panier
            $contenu .= '<form method="post" action="panier.php">';
                $contenu .= '<input type="hidden" name="id_produit" value="'.$produit['id_produit'].'">';

                $contenu .= '<select name="quantite" id="quantite" class="form-group-sm form-control-static">';
                    for  ($i = 1;$i <= $produit['stock'] && $i <= 5; $i++) {
                        $contenu .= "<option>$i</option>";
                    }
                $contenu .= '</select>';

                $contenu .= '<input type="submit" name="ajout_panier" value="ajouter au panier" class="btn btn-success" style="margin-left:10px;">';
            $contenu .= '</form>';
        } else {
            $contenu .= '<p>Rupture de stock</p>';
        }

        // 4- Lien de retour vers la boutique
        $contenu .= '<p><a href="boutique.php?categorie='.$produit['categorie'].'">Retour vers votre sélection</a></p>';
    $contenu .= '</div>';
} else {
    // si l'indice id_produit n'est pas dans l'URL
    header('location:boutique.php');    // on redirige vers la boutique
    exit();
}



// --------------------------------------------  AFFICHAGE --------------------------------------------
require_once('inc/haut.inc.php');
echo $contenu_gauche;   // recevera le pop up de confirmation d'ajout au panier
?>
    <div class="row">
        <?php echo $contenu; // affiche la détail d'un produit?> 
    </div>

    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">Suggestions de produits</h3>
        </div>
        <?php echo $aside; // affiche les produits suggérés ?>
    </div>


<?php
require_once('inc/bas.inc.php');