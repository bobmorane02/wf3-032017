<?php

interface Mouvement {
    public function start();    // Dans une interface les méthodes n'ont pas de contenu
    public function turnRight();
    public function turnLeft();
}

class Bateau implements Mouvement { // on n'utilise pas extends, mais implements dans le cadre des interfaces
    public function start(){
        # Code ...     OBLIGATION de définir toutes les méthodes récupérées via l'implémentation de l'interface.
    }    
    public function turnRight(){
        # Code ...
    }
    public function turnLeft(){
        # Code ...
    } 
}

class Avion implements Mouvement{
    public function start(){
        # Code ...     
    }    
    public function turnRight(){
        # Code ...
    }
    public function turnLeft(){
        # Code ...
    } 
}

/*
    - Une interface est une liste de méthodes (sans contenu) qui permets de garantir que toutes les classes qui vont
      implémenter l'interface contiendront les mêmes méthodes et les mêmes noms.

    - Une interface n'est pas instanciable.
    - Une classe peut implémenter plusieurs interfaces.
    - Une classe peut à la fois extends une autre classe  et implémenter une ou plusieurs interfaces.
    - Les méthodes d'une interface doivents forcement être public sinon elles ne peuvent être définies.
*/