<?php

class Animal {
    protected function deplacement(){
        return 'Je me déplace';
    }

    public function manger(){
        return 'Je mange';
    }
}

// ------------------------------

class Elephant extends Animal {
    // tout le code de Animal est ici ...

    public function quiSuisJe(){
        echo 'Je suis un elephant et '.$this->deplacement();
        // Je peut appeler la méthode déplacement avec $this car en tant que méthode
        // protected elle est accessible dans la classe où elle est déclarée et dans
        // les classes héritiéres.
    }

}

// ------------------------------

class Chat extends Animal {
    // tout le code de Animal est ici ...

    public function quiSuisJe(){
        echo 'Je suis un chat';
    }

    public function manger(){   // redéfinition de méthode seulement pour la classe Chat.
        return 'Je mange peu !';
    }
}

// -------------------------------

$eleph = new Elephant;
echo $eleph->manger().'<br>';
echo $eleph->quiSuisJe().'<br>';

$chat = new Chat;
echo $chat->manger().'<br>';
echo $chat->quiSuisJe().'<br>';

/*
    L'héritage est l'un des fondements de la programation orientée objet
    lorsqu'une classe hérite d'une autre classe, c'est comme si tout le code
    était inporté. Les élémentss (non private) sont donc accessible avec $this.

    Redefinition : Une classe enfant (héritière) peut modifier le comportement
    global d'une méthode héritée.
    Surcharge : une classe enfant (héritière) peut modifier en partie le 
    comportement d'une méthode héritée (voir chapitre 6, fichier surcharge.php)

    L'interpréteur va d'abord regarder si une méthode existe dans la classe qui
    l'éxécute et s'il ne la trouve pas il va ensuite regarder dans la classe mére.
*/