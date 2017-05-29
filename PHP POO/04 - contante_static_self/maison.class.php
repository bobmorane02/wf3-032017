<?php

class Maison {
    
    public $couleur = 'blanc';
    public static $espaceTerrain = '500m2';
    private $nbPorte = 10;
    private static $nbPiece = 7;
    const HAUTEUR = '10m'; 

    public function getNbPorte(){
        return $this->nbPorte;
    }

    public static function getNbPiece(){
        return self::$nbPiece;
    }
}

// --------------------------------

$maison = new Maison;
echo 'Couleur : '.$maison->couleur.'<br/>'; // OK, je fais appel à un élément de l'objet par l'objet
 // echo 'Terrain : '.$maison->espaceTerrain.'</br>'; ERREUR je tente d'appeler un element appartenant à la classe et pas à l'objet

// Ce qui suit fonctionne également sans instanciation de la classe
echo  'Terrain : '.Maison::$espaceTerrain.'</br>'; // OK je fais appel à un élément apparteant à la classe depuis la classe.

// echo 'Porte : '.$maison->nbPorte.'<br/>'; Erreur : je tente d'appeler une propriété private à l'extérieur de la classe.
echo 'Porte : '.$maison->getNbPorte().'<br/>'; // OK je fait appel à une propriété private via son getter qui lui est public

echo 'Piéces : '.Maison::getNbPiece().'<br/>'; // j'accéde à une propriété private et static par le biais d'un getter sur la classe (static)
                                               // tout élément (propriété ou méthode) de type static appartient à la classe et non à l'instance. 
                                        
echo 'Hauteur : '.Maison::HAUTEUR.'<br/>';  // Une constante n'est accessible que par la classe

/*
    Opérateurs : 
        1objet->    : élément d'un objet à l'exterieur de la classe
        $this->     : à l'objet instancié
        class::     : élément d'une classe à l'extérieur de la classe
        self::      : élément d'une classe à l'intérieur de la classe (équivalent de $this pour un objet)

    2 questions :
        - est-ce static ?
            - si oui : 
                Suis-je à l'intérieur de la classe (private)?
                    si oui : self:: 
                    si non : Class::
            - si non : 
                Suis-je à l'intérieur de la classe (private)?
                    si oui : $this->
                    si non : $objet->

    static, signifie qu'un élément appartient à la classe. Pour y accéder il faut l'appeler par la classe (Class:: ou self::)

    const signifie d'un élément appartient à la classe et ne sera jamais modifiable. Le nom des const est toujours écrit 
    en MAJUSCULE  et sans $ !!!
*/