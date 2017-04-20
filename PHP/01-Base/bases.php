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

