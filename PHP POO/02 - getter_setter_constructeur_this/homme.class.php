<?php

class Homme {
    private $prenom;    //  Propriété private
    private $nom;       //  Propriété private

    public function setPrenom ($prenom) {
        if (!empty($prenom) && is_string($prenom) && strlen($prenom)>3 && strlen($prenom)<20){
            $this->prenom = $prenom;
        }
    }

    public function getPrenom () {
        return $this->prenom;
    }

    public function setNom ($nom) {
        if (!empty($nom) && is_string($nom) && strlen($nom)>3 && strlen($nom)<20){
            $this->nom = $nom;
        }
    }

    public function getnom () {
        return $this->nom;
    }
    
}

// --------------------------------------
$homme = new Homme;

// $homme->prenom = 'Robert';   ERREUR : private innaccessible à l'extérieur de la classe.
// echo $homme->prenom;

$homme->setPrenom('Robert');
echo 'Prenom : '.$homme->getPrenom().'<br/>';

$homme->setNom('Kowalczyk');
echo 'Je m\'appel : '.$homme->getPrenom().' '.$homme->getnom().'<br/>';

/*
    Pourquoi faire des getters et des setters ?
        - Le PHP est un langage qui ne type pas ses variables. Il faut systématiquement contrôler l'intégrité des
          données renseignées.
        - Donc utiliser la visibilité PRIVATE est une bonne contrainte. Tout dév devra OBLIGATOIREMENT passer par le
          setter pour affecter une valeur, et donc par des contrôles.
    Setter  : Affecter une valeur
    Getter  : Récupérer une valeur
    On aura autant de getter et setter que de propriétés private

    $this représente dans la classe l'objet en cours de manipulation.
*/