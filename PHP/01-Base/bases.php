<style>h2{font-size:15px;
          color:red;
         }
</style>

<?php
// --------------------------------------------
echo '<h2> Les Balises PHP </h2>';
// --------------------------------------------
?>

<?php
//  Pour ouvrir un passage en PHP, on utilise la balise précédente
// Pour fermer un passage en PHP, on utilise la balise suivante :
?>

<strong>Bonjour</strong> <!-- en dehors des balises d'ouverture et de fermeture du
PHP , nous pouvons écrire du HTML -->

<?php
// --------------------------------------------
echo '<h2> Ecriture et affichage </h2>';
// --------------------------------------------
echo 'Bonjour'; // echo est une instruction qui permet d'effectuer un affichage
                // Noter que les instructions se terminent par un ";"
echo '<br>';    // On peut mettre des balises HTML dans un echo, elles sont interprétées comme telles.

print 'Nous sommes jeudi';  // print est une autre instruction d'affichage.

// Pour info, il existe d'autres instructions d'affichage (cf plus loin)
// print_r();
// var_dump();

// --------------------------------------------
echo '<h2> Variables : types / déclaration / affectation </h2>';
// --------------------------------------------
// Définition : une variable est un espace mémoire nommé qui permet de conserver un valeur.
// En PHP, on déclare une variable avec le signe $

$a = 127;   // Je déclare la variable a et lui affecte la valeur 127
// Le type de la variable a est un interger (entier)

$b = 1.5;   // un type double pour nombre à virgule

$a = 'une chaine de caratéres'; // type string pour une chaine de caractéres
$b = '127'; // string également car contenu dans des quotes

$a = true;  // type boolean qui prend 2 valeurs possibles : true ou false

// --------------------------------------------
echo '<h2> Concaténation </h2>';
// --------------------------------------------
$x = 'Bonjour ';
$y = 'tout le monde';
echo $x.$y.'<br>';  // point de concaténation que l'on peut traduire par "suivi de"

echo "$x $y <br>"; // on obtient le même résultat sans concaténation ( cf chapitre d'aprés 
// pour l'explication de l'évaluation des variables dans les guillemets)

// --------------------------------------------
// Concaténation lors de l'affectation :
$prenom1 = 'Bruno';     // déclaration de la variable $prenom1
$prenom1 = 'Claire';    // Ici la valeur "Claire" écrase la valeur précédente "Bruno" qui était contenue dans la variable
echo $prenom1.'<br>';   // affiche "Claire"

$prenom2 = 'Bruno';
$prenom2 .= 'Claire';   // On affecte la valeur "Claire" à la variable $prenom2 en l'ajoutant
                        // à la valeur précedemment contenue dans la variable grâce à l'opérateur .=
echo $prenom2.'<br>';   // affiche BrunoClaire

// --------------------------------------------
echo '<h2> Guillemets et quotes </h2>';
// --------------------------------------------
$message = "aujourd'hui";   // ou bien
$message = 'aujourd\'hui';  // dans les quotes on échappe les apostrophes avec l'anti-slash

$txt = 'Bonjour';
echo "$txt tout le monde <br>"; // les variables sont évaluées dans les guillemets (c'est leur contenu qui est affiché)
echo '$txt tout le monde <br>'; // dans des quotes la variable n'est pas évaluée seul son nom est affiché

// --------------------------------------------
echo '<h2> Constante </h2>';
// --------------------------------------------
// Une constante permet de conserver une valeur non modifiable durant la durée du script.
// Trés utile pour garder de maniére certaine la connexion à une BDD ou le chemin du site.

define("CAPITALE","Paris"); // par convention on écrit toujours le nom des constantes en MAJUSCULES
                            // define() permet de déclarer une constante dont on indique d'abord le
                            // nom, puis la valeur
echo CAPITALE.'<br>';       // affiche Paris

// Constantes magiques :
echo __FILE__.'<br>'; // affiche le chemin complet du fichier dans lequel on est.
echo __LINE__.'<br>'; // affiche la ligne à laquelle on est.

// --------------------------------------------
echo '<h2> Opérateur arithmétiques </h2>';
// --------------------------------------------
$a = 10;
$b = 2;

echo $a+$b.'<br>';  // affiche 12;  addition
echo $a-$b.'<br>';  // affiche 8;   soustraction
echo $a*$b.'<br>';  // affiche 20;  multiplication
echo $a/$b.'<br>';  // affiche 5;   division
echo $a%$b.'<br>';  // affiche 0;   modulo (reste de la division entiére)

// -------------------------------------------
// Opérations et affectations combinées :
$a += $b;   // $a vaut 12
$a -= $b;   // $a vaut 10
$a *= $b;   // $a vaut 20
$a /= $b;   // $a vaut 10
$a %= $b;   // $a vaut 0

// -------------------------------------------
// Incrémenter et décrémenter :
$i = 0;
$i++;   // $i vaut 1 incrémenté de 1
$i--;   // $i vaut 0 décrementé de 1

$k = ++$i;      // la variable  $i est incrémentée de 1, puis affectée à $k
echo $i.'<br>'; // 1
echo $k.'<br>'; // 1

$k = $i++;      // la variable $i est affectée à $k, puis incrémentée de 1
echo $i.'<br>'; // 2
echo $k.'<br>'; // 1

// --------------------------------------------
echo '<h2> Structures conditionnels et opérateurs de comparaison </h2>';
// --------------------------------------------

$a = 10;$b = 5;$c = 2;
if($a > $b){ // si la condition renvoie true , on execute les accolades qui suivent
    echo '$a est bien supérieur à $b <br>';
} else {     // sinon on execute ce qui suit le else
    echo 'Non, $b est supérieur à $a <br>';
}

// -------------------------------------------
if ($a>$b && $b>$c){ // && signifie ET
    echo 'les 2 conditions sont vraies <br>';
}

// -------------------------------------------
if ($a==9 || $b>$c){ // || signifie OU est == signifie "égal"
    echo 'une des 2 conditions est vraie <br>';
} else {
    echo 'les 2 conditions sont fausses <br>';
}

// -------------------------------------------
if ($a == 8){
    echo 'Réponse 1 <br>';
} elseif ($a!=10){  // Sinon si $a différent de 10 on exécute les accolades qui suivent
    echo 'Réponse 2 <br>';
} else {            // Sinon, si les conditions précédentes sont fausses on exécute les accolades qui suivent
    echo 'Réponse 3 <br>';
}

// -------------------------------------------

if ($a == 10 XOR $b == 6){
    echo 'Une des 2 conditions est vraie <br>';  // Une des 2 conditions doit étre vraie mais pas les 2 en même temps
}

// -------------------------------------------
// Conditions ternaires (forme contractée de la condition)
echo ($a == 10)?'$a est égale à 10 <br>':'$a est différent de 10 <br>';
// le "?" remplace le if, le ":" remplace le else. Si $a vaut 10 on affiche le premier terme sinon le second

// -------------------------------------------
// différence entre == et ===
$vara=1;    // integer
$varb='1';  // string
if($vara == $varb) {
    echo 'Il y a égalité en valeur entre les deux variables <br>';
}

if($vara === $varb) {
    echo 'Il y a égalité en valeur et en type entre les deux variables <br>';
}
// Avec la présence du triple =, la comparaison ne fonctionne pas car les variables ne sont pas du même type :
// ici on compare un integer avec un string

/*
    =       affectation
    ==      comparaison en valeur
    ===     comparaison en valeur et en type
*/

// -------------------------------------------
//empty() et isset() :
// empty() : teste si c'est vide (0,'',NULL,false ou undefined)
// isset() : teste si défini et non NULL

$var1 = 0;
$var2 = '';

if (empty($var1)) echo 'on a 0, vide, ou non définie <br>';
if (isset($var2)) echo 'var2 existe bien <br>';

// différence entre empty et isset : si on met les lignes 198 et 199  en commentaire,
// empty reste vrai car $var1 n'est pas défini, alors que isset est faux $var2 n'est pas
// définie.

// empty sera utilisé pour  vérifier, par exemple, que les champs d'un formulaire sont bien
//  remplis. isset permet de vérifier, par exemple l'existence d'un indice dans un array

// Entrer une valeur dans une variable sous condition (PHP 7) :
$var1 = isset($mavar) ? $mavar : 'valeur par defaut'; // dans cette ternaire on affecte la valeur de $mavar à $var1
                                                      // sinon on affecte la valeur 'valeur par defaut
echo $var1.'<br>';

// En PHP 7 on fait :
$var2 = $mavar ?? 'valeur par defaut'; // Cela fait exactement la même chose. le "??" signifie prend la premiere
                                       // valeur qui existe.
echo $var2.'<br>';

$var3 = $_GET['pays'] ?? $_GET['ville'] ?? 'pas d\'info'; // Soit on prend le pays s'il existe, soit la ville si elle
                                                          // elle existe, soit "pas d'info"
echo $var3.'<br>';

// --------------------------------------------
echo '<h2> Condition Switch </h2>';
// --------------------------------------------
// Dans le switch ci-dessous, les "case" représentent les différent cas dans lesquels on peut potentiellement tomber.

$couleur='jaune';

switch($couleur){
    case 'bleu' : echo 'Vous aimez le bleu <br>'; break;
    case 'rouge' : echo 'Vous aimez le rouge <br>'; break;
    case 'vert' : echo 'Vous aimez le vert <br>'; break;
    default : echo 'Vous n\'aimez rien ! <br>';    
}

// Le switch compare la valeur de la variable à chaque case. Lorsqu'une valeur correspond, on exécute l'instruction
// en regard du case, puis un break indique la sortie du switch
// Le default correspond au cas ou aucun case n'est valide.

// exercice : écrivez la condition ci-dessus avec des if
if($couleur == 'bleu'){
    echo 'Vous aimez le bleu <br>';
} elseif ($couleur == 'rouge'){
    echo 'Vous aimez le rouge <br>';
} elseif ($couleur == 'vert'){
    echo 'Vous aimez le vert <br>';
} else {
    echo 'Vous n\'aimez rien ! <br>';
}

// --------------------------------------------
echo '<h2> Fonctions prédéfinies </h2>';
// --------------------------------------------
// Une fonction prédéfinie permet de réaliser un traitement spécifique prévu dans le langage.

// --------------------------------------------
echo '<h2>Traitement des chaînes de caractères (strlen,strpos,substr)</h2>';

$email1 = "prenom@site.fr";

echo strpos($email1,'@').'<br>'; // strpos() indique la position 6 du caratére "@" dans la chaine $email1
echo strpos('Bonjour','@');
var_dump(strpos('Bonjour','@'));
// Quand j'utilise une fonction prédéfinie, il faut se demander quels sont les arguments à lui fournir
// pour qu'elle s'exécute correctement, et ce qu'elle peut retourner comme résultat.
// Dans l'exemple de strpos() : succès => integer, échec => booléan false.

// --------------------------------------------
$phrase = 'Mettez une phrase à cet endroit';
echo '<br>'.strlen($phrase).'<br>';

// --------------------------------------------
$texte = 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Deleniti ipsa iure eveniet tempore, iusto aspernatur magnam, excepturi.';
echo substr($texte,0,20).'...<a href="">Lire la suite</a><br>'; // On découpe une partie du texte et on lui concaténe un lien. Succès => string 
// sinon false.

// --------------------------------------------
echo str_replace('site','gmail',$email1).'<br>'; // remplace 'site' par 'gmail' dans le string contenu dans $email1

// --------------------------------------------
$message = '       Hello world!            ';
echo strtolower($message).'<br>'; // chaine en minuscule
echo strtoupper($message).'<br>'; // chaine en majuscule

echo strlen($message).'<br>';
echo strlen(trim($message)).'<br>'; // trim() permet de supprimer les espaces au début et à la fin d'une chaine.

// --------------------------------------------
echo '<h2> Manuel PHP en ligne </h2>';
// --------------------------------------------

echo '<a href="https://secure.php.net/manual/fr/index.php" target="_blank">Manuel du PHP en ligne</a>';

// --------------------------------------------
echo '<h2> Gestion des dates </h2>';
// --------------------------------------------
echo date('d/m/Y H:i:s').'<br>'; // affiche la date et l'heure suivant le format indiqué

echo time().'<br>'; // retour le timestamp actuel = nombre de secondes écoulées depuis le 01/01/1970 à 00:00:00
                    // (date de création du premier systéme UNIX).

// La fonction prédéfinie strtotime() :
$dateJour = strtotime('10-01-2016'); // retourne le timestamp de la date en argument
echo $dateJour.'<br>';

// La fonction strftime () :
$dateFormat = strftime('%Y-%m-%d',$dateJour); // Transforme le timestamp donné selon le format demandé.
echo $dateFormat.'<br>'; // Affiche 2016-01-10

// Exemple de convertion de format de date :
// Transformer 23-05-2015 en 2015-05-23
echo strftime('%Y-%m-%d',strtotime('23-05-2015')).'<br>';

// Tranformer 2015-05-23 en 23-05-20158
echo strftime('%d-%m-%Y',strtotime('2015-05-23')).'<br>';

// Cette méthode de transformation est limitée dans le temps (2038) ...
// On peut donc utiliser une autre méthode avec la classe DateTime :
$date = new DateTime('11-04-2017'); // On intentie un nouvel objet DateTime de nom $date
echo $date->format('Y-m-d');        // On applique la méthode format() de cette objet au paramétre passé
