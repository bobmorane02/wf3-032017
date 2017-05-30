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