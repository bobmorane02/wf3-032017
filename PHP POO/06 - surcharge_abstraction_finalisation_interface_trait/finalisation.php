<?php

final class Application {     // Création d'un classe finale : signifiant qu'elle ne pourra pas être héritée

    public function run(){
        return "L'application se lance !";
    }
}

// ------------------------------

# class Extension extends Application{}   // IMPOSSIBLE ! Une classe finale ne peut pas être hérité.

// ------------------------------
$app = new Application;     // OK ! Une classe finale peut être instanciée
$app->run();



class Appication2 {
    final public function run2(){
        return "L'application se lance !";        
    }
}

class Extension2 extends Appication2 {  // OK, Application2 n'est pas final donc on peut en hériter

    public function run2(){     # ERREUR ! IMPOSSIBLE de redéfinir ou surcharger une méthode finale.
        # code...
    }
}

/*
    - Une classe finale ne peut pas être héritée
    - Une classe finale peut être instanciée 
    - Une classe finale n'a que des méthodes finales puisque par définition elle ne pourra être héritée
      donc ses méthodes ne pourront être surchargées ou redéfinies
    - UNe méthode final peut être présente dans une classe "normale"
    - Une méthode fianl ne peut être surchargée ou redéfinie.
*/