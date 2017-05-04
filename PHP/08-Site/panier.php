<?php
require_once('inc/init.inc.php');
// -------------------------------------------- TRAITEMENT --------------------------------------------
// Ajouter un produit au panier

if (isset($_POST['ajout_panier'])) {    // Si on à cliqué sur "ajouter au panier", alors on séléctionne en BDD
                                        // les infos du produit ajouté (prix et titre)
    $resultat = executeRequete("SELECT id_produit,titre,prix FROM produit WHERE id_produit = :id_produit",array(':id_produit'=>$_POST['id_produit']));
    $produit = $resultat->fetch(PDO::FETCH_ASSOC);  // pas de while car produit unique (id_produit)

    ajouterProduitDansPanier($produit['titre'],$_POST['id_produit'],$_POST['quantite'],$produit['prix']);

    // On redirige vers la fiche produit en indiquant que le produit a bien été ajouté au panier
    header('location:fiche_produit.php?statut_produit=ajoute&id_produit='.$_POST['id_produit']);
    exit();
}

// Vider le panier

if (isset($_GET['action']) && $_GET['action'] == 'vider') { // s'il y a l'indice 'action' dans l'url et qu'il vaut 'vider' :
    unset($_SESSION['panier']); // unset supprime un array ou une variable
}

// Supprimer un article du panier
if (isset($_GET['action']) && $_GET['action'] == 'supprimer_article' && isset($_GET['id_articleASupprimer'])) {
    retirerProduitDuPanier($_GET['id_articleASupprimer']);  // on passe à la fonction retirerProduitDuPanier() l'id du produit à supprimer
}

// Valider le panier
if (isset($_POST['valider'])) {
    $id_membre = $_SESSION['membre']['id_membre'];
    $montant_total = montantTotal();

    // Le panier étant validé, on inscrit la commande en BDD :
    executeRequete("INSERT INTO commande (id_membre,montant,date_enregistrement) VALUES (:id_membre,:montant,NOW())",array(':id_membre'=>$id_membre,':montant'=>$montant_total));

    // On récupére l'id_commabnde de la commande insérée ci-dessus, pour l'utiliser en clé étrangére dans la table details_commande :
    $id_commande = $pdo->lastInsertId();

    // Mise à jour de la table details_commande :
    for ($i=0; $i < sizeof($_SESSION['panier']['id_produit']);$i++) {
        // On parcourt le panier pour enregistrer chaque produit :
        $id_produit = $_SESSION['panier']['id_produit'][$i];
        $quantite = $_SESSION['panier']['quantite'][$i];
        $prix = $_SESSION['panier']['prix'][$i];

        executeRequete("INSERT INTO details_commande (id_commande,id_produit,quantite,prix) VALUES (:id_commande,:id_produit,:quantite,:prix)",array(':id_commande'=>$id_commande,':id_produit'=>$id_produit,':quantite'=>$quantite,':prix'=>$prix));

        // Mise à jour des stocks suite à la commande :
        executeRequete ("UPDATE produit SET stock = stock - :quantite WHERE id_produit = :id_produit",array(':quantite'=>$quantite,':id_produit'=>$id_produit));
    }

    unset ($_SESSION['panier']);    // on supprime le panier vide

    $contenu .= '<div class="bg-success">Merci pour votre commande, le numéro de suivi est le '.$id_commande.'</div>';
}

// --------------------------------------------  AFFICHAGE --------------------------------------------
require_once('inc/haut.inc.php');
echo $contenu;

echo '<h2>Voici votre panier</h2>';

if(empty($_SESSION['panier']['id_produit'])) {
    // si panier vide :
    echo '<p>Votre panier est vide</p>';
} else {
    echo '<table class="table">';
        echo '<tr class="active">
                <th>Titre</th>
                <th>N° du produit</th>
                <th>Quantité</th>
                <th>Prix unitaire</th>
                <th>Action</th>
              </tr>';
        
        // On parcourt l'array $_SESSION[panier] pour afficher les produits qui s'y trouvent
        for ($i = 0;$i < sizeof($_SESSION['panier']['id_produit']);$i++){
            echo '<tr>';
                echo '<td>'.$_SESSION['panier']['titre'][$i].'</td>';
                echo '<td>'.$_SESSION['panier']['id_produit'][$i].'</td>';
                echo '<td>'.$_SESSION['panier']['quantite'][$i].'</td>';
                echo '<td>'.$_SESSION['panier']['prix'][$i].' €</td>';
                echo '<td>
                        <a href="?action=supprimer_article&id_articleASupprimer='.$_SESSION['panier']['id_produit'][$i].'" class="btn btn-warning btn-xs">Supprimer article</a>
                      </td>';
            echo '</tr>';
        }

        echo '<tr class="active">
                <th colspan="3">Total</th>
                <th colspan="2">'.montantTotal().' €</th>
              </tr>';   // La fonction utilisateur montantTotal() est déclarée dans fonction.inc.php et retourne le total du panier
        
        // Si le membre est connecté, on affiche le formulaire de validation du panier :
        if (internauteEstConnecte()) {
            echo '<form method="post" action="">
                    <tr class="text-center">
                        <td colspan="5">
                            <input type="submit" name="valider" value="Valider le panier" class="btn btn-success btn-sm col-xs-2" style="float:none">
                        </td>
                    </tr>
                  </form>';
        } else {
        // Membre non connecté, on l'invite à s'incrire ou se connecter
            echo '<tr class="text-center">
                        <td colspan="5">
                            Veuillez vous <a href="inscription.php">inscrire</a> ou vous <a href="connexion.php">connecter</a> afin de valider le panier
                        </td>
                  </tr>';
        }

        echo '<tr class="text-center">
                    <td colspan="5">
                        <a href="?action=vider" class="btn btn-danger btn-sm col-xs-2" style="float:none">Vider le panier</a>
                    </td>
            </tr>';
        
    echo '</table>';

} // fin du else

require_once('inc/bas.inc.php');