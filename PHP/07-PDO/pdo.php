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

// ********************************************
// while et fetch_assoc
// ********************************************
echo '<h1>04- while et fetch_assoc</h1>';

$resultat = $pdo->query("SELECT * FROM employes");

echo 'Nombres d\'employés : '.$resultat->rowcount().'<br>'; // permet de compter le nombre de lignes retournées par la requête

while($contenu = $resultat->fetch(PDO::FETCH_ASSOC)){   // fetch retourne la ligne suivante du jeu de résultat en array associatif.
                                                        // La boucle while permet de faire avancer le curseur dans le jeu de résulats,
                                                        // et s'arrête quand il est à la fin des résultats.
 //   echo'<pre>';print_r($contenu);echo'</pre>'; // On voit que $contenu est un array associatif qui contient les données de chaque ligne
                                                // du jeu de résultats. Le nom des indices correspondent aux mon des champs.

    echo $contenu['id_employes'].'<br>';
    echo $contenu['prenom'].'<br>';
    echo $contenu['nom'].'<br>';
    echo $contenu['sexe'].'<br>';
    echo $contenu['service'].'<br>';
    echo $contenu['date_embauche'].'<br>';
    echo $contenu['salaire'].'<br>';
    echo '----------------------<br>';
}

// Quand vous faite une requête qui ne sort qu'un seul résultat : pas de boucle while mais un fetch seul.
// Quand vous avez plusieurs résultats dans la requête : on fait une boucle while pour parcourir tous les résultats.

// ********************************************
// fetchAll
// ********************************************
echo '<h1>05- fetchAll</h1>';

$resultat = $pdo->query("SELECT * FROM employes");

$donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);   // retourne toutes les lignes de résultats dans un tableau multidimensionnel
                                                    // sans faire de boucle : vous array associatif à chaque indice numérique
                                                    // Marche aussi avec fetch_num

// echo'<pre>';print_r($donnees);echo'</pre>';

// Pour lire le contenu d'un array multidimensionnel, nous faisons des boucles foreach imbriquées : 
echo '<strong>Double boucle foreach</strong><br>';

foreach ($donnees as $contenu){ // Contenu est un sous array associatif
    foreach($contenu as $index => $valeur){ // on parcourt donc chaque sous array
        echo "$index : $valeur<br>";
    }
    echo '-------------------------<br>';
}

// ********************************************
// Exercice
// ********************************************
echo '<h1>06- Exercice</h1>';

// Afficher la liste des bases de données présentent sur votre SGBD dans une liste <ul><li>.
// Pour mémoire, la requête SQL est SHOW DATABASES.

$resultat = $pdo->query("SHOW DATABASES");
$bases = $resultat->fetchAll(PDO::FETCH_NUM);
echo '<ul>';
foreach ($bases as $base){
    echo "<li>$base[0]</li>";
}
echo '</ul>';

// Autre version :
$resultat = $pdo->query("SHOW DATABASES");
echo '<ul>';
while ($base = $resultat->fetch(PDO::FETCH_NUM)){
    echo "<li>$base[0]</li>";
}
echo '</ul>';

// ********************************************
// Table HTML
// ********************************************
echo '<h1>07- Table HTML</h1>';

$resultat = $pdo->query("SELECT * FROM employes");

echo '<table border ="1">';
    // Affichage de la ligne d'entêtes
    echo '<tr>';
        for ($i=0; $i < $resultat->columnCount(); $i++){
           // echo'<pre>';print_r($resultat->getColumnMeta($i));echo'</pre>'; // pour voir ce que retourne la méthode getColumnMeta() : un array
                                                                              // avec notamment un indice name qui contient le nom du champ

            $colonne = $resultat->getColumnMeta($i); //$colonne est un array qui contient l'indice name
            echo '<th>'.$colonne['name'].'</th>';   // l'indice name contient le nom du champ
        }
    echo '</tr>';

    // Affichage des autres lignes :

    while($ligne = $resultat->fetch(PDO::FETCH_ASSOC)){
        echo '<tr>';
            foreach($ligne as $info){
                // echo '<pre>';print_r($info);echo '</pre>';
                echo'<td>'.$info.'</td>';
            }
        echo '</tr>';
    }
echo '</table>';

// ********************************************
// Requête préparée : prepare() + bindParam() + execute()
// ********************************************
echo '<h1>08- Requête préparée : prepare() + bindParam() + execute()</h1>';

$nom = 'sennard';

// Préparation de la requête :
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");   // On prépare la requête sans l'exécuter, avec un marqueur nominatif :nom

// On donne une valeur au marqueur :nom
$resultat->bindParam(':nom',$nom,PDO::PARAM_STR);   // je lie le marqueur :nom à la variable $nom. Si on change le contenu de la variable, la valeur
                                                    // du marqueur changera automatiquement si on fait plusieurs execute().

// On exécute la requête :
$resultat->execute();

$donnees = $resultat->fetch(PDO::FETCH_ASSOC);      // $donnees est un array associatif
echo implode($donnees,' - ');                       // implode transforme l'array en string

/*
    prepare() renvoie toujours un objet PDOStatment
    execute() renvoie :
        Succès  : un objet PDOStatment
        Echec   : false

    Les requêtes préparées sont à préconiser si vous exécutez plusieurs fois la même requête (par exemple dans une boucle), et ainsi éviter le cycle
    complet analyse/interprétation/exécution de la requête.

    Par ailleurs, les requêtes préparées sont souvent utilisées pour assainir les données en forçant la type des valeurs communiquées aux marqueurs.
*/

// ********************************************
// Requête préparée : prepare() + bindValue() + execute()
// ********************************************
echo '<h1>09- Requête préparée : prepare() + bindValue() + execute()</h1>';

$nom = 'Thoyer';
$resultat = $pdo->prepare("SELECT * FROM employes WHERE nom = :nom");   // On prépare la requête

// On lie le marqueur à un valeur
$resultat->bindValue(':nom',$nom,PDO::PARAM_STR);   // bindValue() reçoit une variable ou un string. Le marqueur pointe uniquement vers la valeur.
                                                    // Si celle-ci change, il faut refaire in bindValue() pour prendre en compte cette nouvelle
                                                    // valeur lors d'un prochain execute()

// On exécute la requête :
$resultat->execute();

$donnees = $resultat->fetch(PDO::FETCH_ASSOC);      // $donnees est un array associatif
echo implode($donnees,' - ').'<br>';                // implode transforme l'array en string

// Si on change la valeur de la variable $nom sans faire un nouveau bindValue() le marqueur de la requête conserve la valeur précédante de $nom
$nom = 'durand';
$resultat->execute();
$donnees = $resultat->fetch(PDO::FETCH_ASSOC);
echo implode($donnees,' - ').'<br>';
