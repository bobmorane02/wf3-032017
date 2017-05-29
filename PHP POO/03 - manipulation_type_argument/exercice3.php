<?php

class Vehicule {
    private $litreEssence;  // Nb de litres d'essence dans le véhicule
    private $reservoir;     // Capacité max du réservoir

    public function getLitreEssence(){
        return $this->litreEssence;
    }

    public function setLitreEssence($litre){
        $this->litreEssence = $litre;
    }

    public function getReservoir(){
        return $this->reservoir;
    }

    public function setReservoir($res){
        $this->reservoir = $res;
    }
}

// -------------------------------------------------------

class Pompe {
    private $litreEssence;

    public function getLitreEssence(){
        return $this->litreEssence;
    }

    public function setLitreEssence($litre){
        $this->litreEssence = $litre;
    }

    public function fairePlein(Vehicule $v){
        $essence = $v->getReservoir()-$v->getLitreEssence();
        $this->setLitreEssence($this->getLitreEssence()-$essence);
        $v->setLitreEssence($v->getLitreEssence()+$essence);
    }
}

/*
CONSIGNES : 

1- Création d'un véhicule
2- Attribuer un nombre de litre d'essence au véhicule (5L)
3- Attribuer la capacité max du réservoir du véhicule est de 50L (50)
4- Afficher le nombre de litre d'essence dans le véhicule
5- creation d'une pompe
6- Attribuer un nombre de litre d'essence à la pompe (800L)
7- Afficher le nombre de litre d'essence dans la pompe
8- La pompe donne de l'essence au véhicule et fait le plein
9- Afficher le nombre de litre d'essence dans le véhicule après ravitaillement
10- Afficher le nombre de litre d'essence dans la pompe après ravitaillement

!! Le véhicule ne peut pas recevoir plus que la capacité max de son réservoir !! 
*/


$dacia = new Vehicule;
$dacia->setLitreEssence(5);
$dacia->setReservoir(50);
echo 'Le véhicule contient : '.$dacia->getLitreEssence().' Litres d\'essence<br/>';
$pompe = new Pompe;
$pompe->setLitreEssence(800);
echo 'La pompe contient : '.$pompe->getLitreEssence().' Litres d\'essence<br/><hr/>';
$pompe->fairePlein($dacia);
echo 'Aprés ravitaillement :<br/>';
echo 'Le véhicule contient : '.$dacia->getLitreEssence().' Litres d\'essence<br/>';
echo 'La pompe contient : '.$pompe->getLitreEssence().' Litres d\'essence<br/>';
