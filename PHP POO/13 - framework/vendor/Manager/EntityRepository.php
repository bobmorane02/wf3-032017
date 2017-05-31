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


}