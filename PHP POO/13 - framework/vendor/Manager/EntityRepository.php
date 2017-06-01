<?php

namespace Manager;
use PDO;

class EntityRepository
{
    private $db;    # contiendra la connexion à la BDD (objet PDO récupérer grâce à PDOManager)

    public function getDb(){
        $this->db = PDOManager::getInstance()->getPdo();
        return $this->db;
    }

    public function getTableName(){                     # récupérer le nom de la table à interroger selon l'entité
                                                        # dans laquelle je suis...
            # La commende get_called_class() : me retourne le nom de la classe dans laquelle je suis.

        return strtolower(str_replace(array('Repository\\','Repository'),'',get_called_class()));   
    }

    # REQUETES GENERIQUES 

    public function findAll() {
        $requete = "SELECT * FROM ".$this->getTableName();
        $resultat = $this->getDb()->query($requete);

        $donnees = $resultat->fetchAll(PDO::FETCH_ASSOC);

        if (!$donnees){
            return FALSE;
        } else {
            return $donnees;
        }
    }

    public function find($id){
        $requete = "SELECT * FROM ".$this->getTableName()." WHERE id_".$this->getTableName()." = :id";

        # SELECT * FROM produit WHERE id_produit = :id
        # ou bien
        # SELECT * FROM membre WHERE id_membre = :id
        # ou ainsi de suite ...

        $resultat = $this->getDb()->prepare($requete);
        $resultat-> bindParam(':id',$id,PDO::PARAM_INT);
        $resultat->execute();

        $donnees = $resultat->fetch(PDO::FETCH_ASSOC);

        if (!$donnees){
            return FALSE;
        } else {
            return $donnees;
        }
        
    }

    public function delete($id){
        $requete = "DELETE FROM ".$this->getTableName()." WHERE id_".$this->getTableName()." = :id";
        $resultat = $this->getDb()->prepare($requete);
        $resultat-> bindParam(':id',$id,PDO::PARAM_INT);

        return $resultat->execute();

    }

    public function register($infos){
        $requete = 'INSERT INTO '.$this->getTableName().' ('.implode(',',array_keys($infos)).') VALUES (:'.implode(", :",array_keys($infos)).')';
        $resultat = $this->getDb()->prepare($requete);
        $resultat->execute($infos);

        if(!$resultat){
            return FALSE;
        } else {
            return $this->getDb()->lastInsertId();
        } 
    }

}