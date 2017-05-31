<?php

namespace Entity;

class Commande
{
    private $id_commande,
            $id_membre,
            $montant,
            $date_enregistrement,
            $etat;

    # GETTERS --------------------------

    public function getId_commande(){
        return $this->id_commande;
    }

    public function getId_membre(){
        return $this->id_membre;
    }

    public function getMontant(){
        return $this->$montant;
    }

    public function getDate_enregistrement(){
        return $this->$date_enregistrement;
    }

    public function getEtat(){
        return $this->etat;
    }
    
    # SETTERS --------------------------

    public function setId_commande($id_commande){
        $this->id_commande = $id_commande;
    }

    public function setId_membre($id_membre){
        $this->id_membre = $id_membre;
    }

    public function setMontant($montant){
        $this->montant = $montant;
    }

    public function setTitre($date_enregistrement){
        $this->date_enregistrement = $date_enregistrement;
    }

    public function setEtat($etat){
        $this->etat = $etat;
    }
            
}