<?php

// Surcharge ou Override : permet de modifier le comportement d'une méthode héritée et d'y apporter
// des tritements supplémentaires
// surcharge != redéfinition

class A {
    public function calcul(){
        return 10;
    }
}

class B extends A { // B hérite de A
    public function calcul(){
        return parent::calcul() + 5;    // OK! permet d'appeler le comportement de la méthode calcul() telle
                                        // définie dans la classe parente.
    }
}