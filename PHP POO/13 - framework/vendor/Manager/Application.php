<?php

namespace Manager;

//vendor/Manager/Application.php

final class Application
{
	protected $controller; // Contiendra le controller à instancier
	protected $action;     // Contiendra la méthode à exécuter
	protected $argument = ''; // Contiendra les arguments supplémentaires (cat=xxx, id=xxx, champs_recherche etc...)
	
	public function __construct(){
		// Récupération du controller à instancier : 
		if(isset($_GET['controller']) && !empty($_GET['controller'])){
			if(file_exists(__DIR__ . '/../../src/Controller/' . ucfirst($_GET['controller']) . 'Controller.php')){
				$this -> controller = 'Controller\\' . ucfirst($_GET['controller']) . 'Controller';
				# Si le controller demandé dans l'url (ex:produit) n'est pas vide, et que Controller/ProduitController.php 
				# existe, alors le nom du controller à instancier sera : Controller\ProduitController
			}
			else{
				require(__DIR__ . '/../../src/View/404.html');
			}
		}
		else{
			$this -> controller = 'Controller\ProduitController';
			$this -> action = 'afficheall';
		}
		
		if(isset($_GET['action']) && !empty($_GET['action'])){
			$this -> action = $_GET['action'];
			//Si j'ai une action dans l'url et qu'elle n'est pas vide je stocke le nom de l'action (méthode). 
		}
		else{
			$this -> controller = 'Controller\ProduitController';
			$this -> action = 'afficheall';
		}
		
		if(isset($_GET['id']) && !empty($_GET['id'])){
			$this -> argument = (int) $_GET['id'];
		}
		
		if(isset($_GET['categorie']) && !empty($_GET['categorie'])){
			$this -> argument = (string) $_GET['categorie'];
		}
	}

	
	public function run(){
		if(!is_null($this -> controller)){
			
			$a = new $this -> controller;
			if(!is_null($this -> action) && method_exists($a, $this -> action)){	
				$action = $this -> action;
				$a -> $action($this -> argument); 
			}
			else{
				require(__DIR__ . '/../../src/View/404.html');
			}
		}
		else{
			require(__DIR__ . '/../../src/View/404.html');
		}
	}
}