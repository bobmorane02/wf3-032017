<?php

class Membre {
    private $pseudo;
    private $mdp;

    public function setPseudo ($pseudo) {
        if(!empty($pseudo) && is_string($pseudo) && strlen($pseudo)>3 && strlen($pseudo)<20){
            $this->pseudo = $pseudo;
        } else {
            return false;
        }
    }

    public function setMdp ($mdp) {
        if(!empty($mdp) && is_string($mdp) && strlen($mdp)>3 && strlen($mdp)<20){
            $salt = 'chaine perso'.time();
            $salt = md5($salt);
            $this->mdp = md5($salt.$mdp);
        } else {
            return false;
        }
    }

    public function getPseudo(){
        return $this->pseudo;
    }

    public function getMdp(){
        return $this->mdp;
    }
    
}

// -----------------------------
// Exercice: Au regard de cette classe, veuillez créer un membre, affecter des valeurs à pseudo et mdp et les afficher :

$membre = new Membre;
$membre->setPseudo('bobmorane');
$membre->setMdp('naB023');

echo 'Pseudo : '.$membre->getPseudo().'<br/>Mot de passe : '.$membre->getMdp();
