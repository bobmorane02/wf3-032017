<?php

namespace General;

require ('espace1.php');
require ('espace2.php');

use Espace1;
use Espace2;
use PDO; // Lorsqu'on est dans un namespace définie (General) et que l'on souhaite utiliser une
         // classe existante dans l'espace global de PHP (ex : PDO ou Mysqli), on doit importer la 
         // classe avec l'instruction USE. 
         // De maniére général on doit toujours importer (USE) les namespaces dont on a besoin.

$c = new Espace1\A;
echo $c->test1();

$d = new Espace2\A;
echo $d->test2();

