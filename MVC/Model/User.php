<?php

namespace Model;

use App\Cnx;

class User {
    /**
     *
     * @var int
     */
    private $id;

    /**
     *
     * @var string
     */
    private $lastname;
    /**...3 lines */
    private $firstname;
    /**...3 lines */  
    private $email;
    /**...3 lines */    
    private $adress;
    
    public function __construct(
        $lastname = NULL, 
        $firstname = NULL, 
        $email = NULL, 
        $adress = NULL,
        $id = NULL    
     ) {
        $this->id = $id;
        $this->lastname = $lastname;
        $this->firstname = $firstname;
        $this->email = $email;
        $this->adress = $adress;
    }

    
    public function getId() {
        return $this->id;
    }

    public function getLastname() {
        return $this->lastname;
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAdress() {
        return $this->adress;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setLastname($lastname) {
        $this->lastname = $lastname;
        return $this;
    }

    public function setFirstname($firstname) {
        $this->firstname = $firstname;
        return $this;
    }

    public function setEmail($email) {
        $this->email = $email;
        return $this;
    }

    public function setAdress($adress) {
        $this->adress = $adress;
        return $this;
    }

    /**
     * Méthode qui retourne tous les utilisteurs enregistrés en BDD
     * 
     * @return array Un tableau d'objets User
     */
    public static function findAll(){
        $pdo = Cnx::getInstance();
        $query = "SELECT * FROM user ORDER BY id";
        $stmt = $pdo->query($query);
        $dbUsers = $stmt->fetchAll();
        $users = [];
        
        foreach ($dbUsers as $dbUser){
            $user = new self(
                        $dbUser['firstname'],
                        $dbUser['lastname'],
                        $dbUser['email'],
                        $dbUser['address'],
                        $dbUser['id']
                    );
            $users[] = $user;
        }       
        return $users;
    }
}
