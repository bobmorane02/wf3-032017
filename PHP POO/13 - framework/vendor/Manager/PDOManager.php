<?php

    namespace Manager;

    use PDO;    # On récupère la classe PDO qui appartient à l'espace global de PHP.
                # Sans cela nous devrions appeler PDO comme cela: \PDO pour sortir de
                # l'espace Manager 

    class PDOManager
    {
        private static $instance = NULL;
        protected $pdo; # contient l'objet PDO (connexion à la BDD)

        private function __construct(){}    # instanciation impossible de l'extérieur
        private function __clone(){}        # clonage immposible
        
        public static function getInstance(){
            if(!self::$instance){
                self::$instance = new self;
            }         
            return self::$instance;
        }

        public function getPdo(){
            include_once(__DIR__.'/../../app/Config.php');
            $config = new \Config;  # sortir du namespace 'Manager' et remonter à la racine car la classe Config n'existe que dans la racine
            $connect = $config->getParametersConnect();

            try{
                $this->pdo = new PDO('mysql:host='.$connect['host'].';dbname='.$connect['dbname'],$connect['login'],$connect['password'],
                                    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
                                    ));
            } catch(PDOException $e) {
                echo '<div style="backgrounf: red; color: white; padding: 20px;">';
                echo 'Vous avez une erreur de connexion à la BDD : <br>';
                echo '<b><u>Message</u></b> :'.$e->getMessage();
                echo '<b><u>Fichier</u></b> :'.$e->getFile();
                echo '<b><u>Ligne</u></b> :'.$e->getLine();
                echo '</div>';
                exit;
            }
            return $this->pdo;
        }
    }