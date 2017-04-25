<?php
// ********************************************
// PDO
// ********************************************
// L'extension PDO 'PHP Data Objects' définit une interface pour accéder à une base de données depuis PHP.

// 01- Connexion ------------------------------
echo '<h1>01- Connexion</h1>';

$pdo = new PDO('mysql:host=localhost;dbname=entreprise','root','',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

// $pdo est un objet issu de la classe prédéfinie PDO : il représente la connexion à la BDD.

/* Les arguments passés à PDO :
   1- driver + serveur + nom de la base de données
    - pseudo de connexion du SGBD
    - mdp de connexion du SGBD
    - options : option 1 pour générer l'affichage des erreurs,option2 = commande à exectuter lors de la connexion
      connexion au serveur, ici on définit le jeu de caractéres (utf8).
*/

print_r($pdo);
echo'<pre>';print_r(get_class_methods($pdo));echo'</pre>'; // Permet d'afficher les méthodes disponibles dans l'objet $pdo.

// ********************************************
// exec() avec INSERT, UPDATE, DELETE
// ********************************************
echo '<h1>02- exec() avec INSERT, UPDATE, DELETE</h1>';

/*  exec() est utilisé pour formuler des requêtes ne retounant pas de résultats : INSERT,UPDATE et DELETE
    Valeur de retour :
        Succés : un integer correspondant au nombre de lignes affectées
        Echec  : false
*/

// $resultat = $pdo->exec("INSERT INTO employes(prenom,nom,sexe,service,date_embauche,salaire) VALUES ('Jean','Bon','m','informatique','2017-04-25',300)");
// echo "Nombre d'enregistrements affectés par l'INSERT : $resultat <br>";
echo 'Dernier ID généré : '.$pdo->lastInsertId().'<br>';

$resultat = $pdo->exec("UPDATE employes SET salaire = 6000 WHERE id_employes = 350");
echo "Nombre d'enregistrements affectés par l'UPDATE : $resultat <br>";

$resultat = $pdo->exec("DELETE FROM employes WHERE id_employes = 992");
echo "Nombre d'enregistrements affectés par l'UPDATE : $resultat <br>";

// ********************************************
// query() avec SELECT + fetch
// ********************************************
echo '<h1>03- query() avec SELECT + fetch</h1>';

$resultat = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
// avec query : $resultat est un objet issu de la classe prédéfinie PDOStatement
/*
    Au contraire d'exec(), query() est utilisé pour la formulation de requêtes retournant un ou plusieurs résultats : SELECT.
    Valeur de retour :
        Succés : objet PDOStatement
        Echec  : false

    Notez qu'avec query(), on peut également utiliser INSERT, DELETE et UPDATE
*/

echo'<pre>';print_r($resultat);echo'</pre>';
echo'<pre>';print_r(get_class_methods($resultat));echo'</pre>'; // Ici on voit les nouvelles méthodes de la classe PDOStatement

// $resultat constitue le résultat de la requête sous forme inexploitable directement : il faut donc le tranformer par la methode
// fetch() : 
$employe = $resultat->fetch(PDO::FETCH_ASSOC);  /* la méthode fetch() avec le paramétre PDO::FETCH_ASSOC permet de tranformer 
                                                   l'objet $resultat en un array associatif exploitable indexé avec le nom des
                                                   champs de la requête. */
echo'<pre>';print_r($employe);echo'</pre>';
echo "Bonjour je suis $employe[prenom] $employe[nom] du service $employe[service]<br>";

// Ou encore faire un fetch selon l'une des méthode suivantes :
$resultat = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
$employe = $resultat->fetch(PDO::FETCH_NUM); // Pour obtenir un array indexé numériquement
echo'<pre>';print_r($employe);echo'</pre>';
echo $employe[1]; // On accéde au prénom par l'indice 1 de l'array $employe

$resultat = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
$employe = $resultat->fetch(); // pour un mélange de FETCH_ASSOC et FETCH_NUM
echo'<pre>';print_r($employe);echo'</pre>';

$resultat = $pdo->query("SELECT * FROM employes WHERE prenom = 'daniel'");
$employe = $resultat->fetch(PDO::FETCH_OBJ); // retourne un nouvel objet avec les nom de champs propriété public
echo'<pre>';print_r($employe);echo'</pre>';
echo $employe->prenom.'<br>'; // affiche la valeur de la propriété prenom de l'objet $employe

// Attention : il choisir l'un des fetch que vous voulez executer sur un jeu de résultat, vous ne pouvez pas faire
// plusieur fetch sur le même résultat ne contenant d'un résultat. En effet cette méthode déplace le curseur de lecture
// sur le résultat suivant du jeu de résultats et dans ce cas est en dehors du jeu de résultat.

// Exercice : afficher le service de l'employée Laura selon 2 méthodes différentes de votre choix.
$resultat = $pdo->query("SELECT * FROM employes WHERE prenom = 'laura'");
$employe = $resultat->fetch(PDO::FETCH_ASSOC);
echo "Laura travaille dans le service $employe[service]<br>";

$resultat = $pdo->query("SELECT service FROM employes WHERE prenom = 'laura'");
$service = $resultat->fetch()[0];
echo "Laura travaille dans le service $service <br>";
