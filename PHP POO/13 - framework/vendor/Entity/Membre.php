<?php

class Membre
{
    private $id_membre,
            $pseudo,
            $mdp,
            $nom,
            $prenom,
            $email,
            $civilite,
            $ville,
            $code_postal,
            $adresse,
            $statut;

    # GETTERS --------------------------

    public function getId_membre(){
        return $this->id_membre;
    }

    public function getPseudo(){
        return $this->pseudo;
    }

    public function getMdp(){
        return $this->mdp;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getCivilite(){
        return $this->civilite;
    }

    public function getVille(){
        return $this->ville;
    }

    public function getCode_postal(){
        return $this->code_postal;
    }

    public function getAdresse(){
        return $this->adresse;
    }

    public function getSatut(){
        return $this->satut;
    }
    
    # SETTERS --------------------------

    public function setId_membre($id_membre){
        $this->id_membre = $id_membre;
    }

    public function setReference($pseudo){
        $this->pseudo = $pseudo;
    }

    public function setCategorie($mdp){
        $this->mdp = $mdp;
    }

    public function setTitre($nom){
        $this->nom = $nom;
    }

    public function setDescription($prenom){
        $this->prenom = $prenom;
    }

    public function setCouleur($email){
        $this->email = $email;
    }

    public function setTaille($civilite){
        $this->civilite = $civilite;
    }

    public function setPublic($ville){
        $this->ville = $ville;
    }

    public function setPhoto($code_postal){
        $this->code_postal = $code_postal;
    }

    public function setPrix($adresse){
        $this->adresse = $adresse;
    }

    public function setStock($statut){
        $this->statut = $statut;
    }
            
}