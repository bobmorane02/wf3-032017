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

// --------------------------------------------
echo '<h2> Les functions utilisateur </h2>';
// --------------------------------------------
// Les fonctions qui ne sont pas prédéfinies dans le langage sont déclarées puis exécutées par l'utilisateur.

// Déclaration d'une fonction :

function separation() {
    echo '<hr>';        // simple fonction permettant de tirer un trait dans la page web.
}

// Appel de la fonction :
separation();   // On exécute la fonction

// --------------------------------------------
// fonction avec arguments : les arguments sont des paramétres fournis à la fonction et lui permettent
// de compléter ou modifier son comportement initialement prévu.

function bonjour($qui){             // $qui apparaît ici pour la premiére fois. Il s'agit d'une variable 
                                    // qui reçoit la valeur d'un argument.
    return 'Bonjour '.$qui.'<br>';  // return permet de renvoyer le résultat de l'exécution de la fonction.                        
}                                   // return temine la fonction toutes instructions suivant return seront
                                    // ignorées.

// Appel de la fonction :
echo bonjour('Robert');             // On appelle la function en lui donnant de string 'Robert' en argument -> affiche 'Bonjour Robert'

$prenom = 'Etienne';
echo bonjour($prenom);              // Ici l'argument est une variable

// --------------------------------------------
// Exercice :
function appliqueTva($prix) {
    return $prix*1.2;
}

// Ecrivez une fonction appliqueTva2 qui applique un taux de TVA quelconque à un prix quelconque.
function appliqueTva2($prix,$taux){
    return $prix+($prix*$taux)/100;
}

echo appliqueTva2(45,20).'<br>'; // lorsqu'une fonction attend N arguments, il faut obligatoirement lui donner N arguments

// --------------------------------------------
// Exercice :
function meteo($saison,$temperature){
    echo "Nous sommes en $saison et il fait $temperature degré(s) <br>";
}

meteo ('hiver',2);
meteo ('printemps',2);

// Créer une fonction meteo2 qui affiche "au printemps" et non "en printemps"
function meteo2($saison,$temperature){
/*  $prefixe = 'en';                                            // Mode if classique
    if ($saison=='printemps'){ $prefixe='au'; } */
    $prefixe = $saison=='printemps'?'au':'en';                  // Mode ternaire
    $pluriel = ($temperature>=-1 and $temperature<=1)?'':'s';   // Bonus gestion pluriel température
    echo "Nous sommes $prefixe $saison et il fait $temperature degré$pluriel <br>";
}

meteo2('printemps',1);
meteo2('été',30);

// --------------------------------------------
// Exercice :
function prixLitre() {
    return rand(1000,2000)/1000; // détermine un prix aléatoire entre 1 et 2€
}

// Ecrivez la fonction factureEssence() qui calcule le prix total de votre facture d'essence en fonction du
// nombre de litres que vous lui donnez. Cette fonction retourne le phrase "Votre facture est de X euros
// pour Y litres d'essence" (X et Y sont variables).
// Dans cette fontion, utilisez la fonction prixLitre() qui vous retourne le prix du litre.

function factureEssence($litre){
    echo 'Votre facture est de '.number_format($litre*prixLitre(), 2)." € pour $litre litres d'essence";
}

factureEssence(20);

// --------------------------------------------
echo '<h2> Les variables locales et globales </h2>';
// --------------------------------------------


function jourSemaine(){
    $jour = 'vendredi'; // ici dans la fonction nous sommes dans un espace LOCAL.
                        // la variable $jour est LOCALE
    return $jour;
}

// A l'extérieur de la fonction je suis dans l'espace GLOBAL.

echo $jour; // la variable locale $jour n'est pas accessible dans l'espace global
echo jourSemaine().'<br>'; // on peut récupérer la valeur de la variable $jour grâce au return de la function.

// --------------------------------------------
$pays ='France';    // variable globale
function affichagePays(){
    global $pays;   // le mot clé global permet de récupérer une variable global au sein de la fonction
    echo $pays;     // On peut utiliser cette variable $pays
}

affichagePays();

// --------------------------------------------
echo '<h2> Les structures itératives (boucles) </h2>';
// --------------------------------------------
// boucle while

$i=0;   // valeur de départ de la boucle
while($i<3){        // tant que $i est inférieur à 3, exécute les instruction qui suivent
    echo $chaine = $i==2?$i:"$i---"; // bonus : on affiche les nombres suivit de "---" sauf pour le dernier soit 3-1=2 
    $i++;           // obligatoire pour éviter une boucle infinie !!!
}

echo '<br>';

// --------------------------------------------
// Exercice à l'aide d'une boucle while afficher dans une balise select les années 1917 à 2017

$annee = date('Y')-100;

echo '<select>';
while ($annee <= date('Y')) {
    echo "<option>$annee</option>";
    $annee++;
}
echo '</select>';

// --------------------------------------------
// Boucle do while
// La boucle do ... while s'execute au moins 1 fois, puis jusqu'à ce que la condition de fin soit fausse

echo '<br>Boucle do while</br>';

do {
    echo 'un tour de boucle';
} while (false); // on met la condition d'exécution ici à la place de false (";" à la fin de la boucle)

// --------------------------------------------
// Boucle for :
echo '<br>';
for($j=0;$j < 16;$j++){ // Init de valeur de départ;condition de boucle;incrémentation ou décrémentation
    print $j.'<br>';
}

// --------------------------------------------
// Exercice : 
// 1- faire une boucle qui affiche 0 à 9 sur la même ligne
// 2- faire la même chose dans un tableau HTML.

for ($i=0;$i<=9;$i++){
    echo " $i ";
}

// 2-
echo '<table border="1"> <tr>';
for ($i=0 ; $i<=9 ; $i++){
    echo "<td> $i </td>";
}
echo '</tr> </table>';

// Contribution perso (un peut de style ne fait pas de mal!)
echo '<style>
        table {
                border-collapse: collapse;
                margin : 20px 0;
              }
        td    {
                padding: 5px 10px;
              }
      </style>';

// Exercice :  faire un tableau de 10 lignes et de 10 colonnes suivant l'exercice précédant
echo '<table border="1">';
for ($j=0 ; $j<=9 ; $j++){
    echo '<tr>';
    for ($i=0 ; $i<=9 ; $i++){
        echo "<td> $i </td>";
    }
    echo '</tr>';
}
echo '</table>';

// --------------------------------------------
echo '<h2> Les Arrays (Tableaux) </h2>';
// --------------------------------------------
// On peut stocker dans un array une multitude de valeur quelque soit leur type.

$liste = array('grégoire','Nathalie','Emilie','François','George');
// déclaration d'un array appelé $liste contenant des prénoms

// echo $liste; // Ca marche pas. Impossible d'afficher directement le contenu d'un array

echo '<pre>';var_dump($liste);echo '</pre>';
echo '<pre>';print_r($liste);echo '</pre>';
// Ces dux instructions d'affichage permettent d'indiquer le type de l'élément mis en argument 
// ainsi que son contenu. Les balises <pre> servent à faire une mise en forme. Ces 2 instructions
// ne servent qu'en phase de développement.

// Autre moyen d'affecter des valeurs dans un tableau :
$tab[] = 'France'; // Permet d'ajouter la valeur 'France' dans le tableau $tab
$tab[] = 'Italie';
$tab[] = 'Espagne';
$tab[] = 'Portugal';

echo '<pre>';print_r($tab);echo '</pre>';  // pour voir le contenu du tableau
echo $tab[1].'<br>'; // Affiche Italie

// Tableau associatif : tableau dont les indices sont littéraux :
$couleur = array("j" => "jaune","b" => "bleu","v" => "vert" ); // on peut choisir le nom de l'indice

// Pour accéder à un élément du tableau associatif :
echo 'La seconde couleur de notre tableau est le '.$couleur['b'].'<br>'; // affiche bleu
echo "La seconde couleur de notre tableau est le $couleur[b] <br>"; // dans ce cas d'affichage il ne faut pas de quotes dans l'indice => sinon ERREUR ...

// --------------------------------------------
// Mesurer la taille d'un array
echo 'Taille du tableau '.count($couleur).'<br>'; // Compte le nombre d'éléments du tableau
echo 'Taille du tableau '.sizeof($couleur).'<br>'; // même chose

// --------------------------------------------
// Tranformer un array en string :
$chaine = implode('-',$couleur); // implode() rassemble les éléments d'un array en une chaine avec un séparateur entre les éléments
echo $chaine.'<br>';

$couleur2 = explode('-',$chaine); // explode() convertie une chaine en array au indices numériques grâce au séparateur indiqué 
print_r($couleur2);
echo '<br>';

// --------------------------------------------
echo '<h2> La boucle foreach pour parcourir les array </h2>';
// La boucle foreach est moyen simple de passer en revue un tableau. Elle fonctionne uniquement les arrays et les objets.
// Elle est automatique et s'arréte à la fin du tableau

foreach ($tab as $valeur) { // La variable $valeur (nom au choix) récupére pour chaque tour de boucle la valeur contenu dans le tableau
    echo $valeur.'<br>';
}

foreach ($tab as $indice => $valeur){ // On parcourt le tableau $tab par les indices auxquels on associe les valeurs.
    echo $indice.' correpond à '.$valeur.'<br>';
}
