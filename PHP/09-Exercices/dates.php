<?php
/*
    1-  Créer une fonction qui retourne la convertion d'une date FR en date US ou inversement.
        Cette fontion prend 2 paramétres : une date valide et le format de conversion "US" ou "FR"

    2-  Vous validez que le paramétre de format est bien "US" ou "FR". La fonction retourne un message si ce n'est
        pas le cas.
*/

// vieille version utiliser plutôt l'objet DateTime 
function dateConvert($date,$format) {
        switch (strtoupper($format)) {
            case 'FR' : return strftime('%d-%m-%Y',strtotime($date));
            case 'US' : return strftime('%Y-%m-%d',strtotime($date));
            default : return 'Le format demandé n\'est pas géré';
        }
}

// C'est mieux comme ça !
function newDateTime($date,$format){
    $ObjDate = new DateTime($date);
    switch (strtoupper($format)) {
            case 'FR' : return $ObjDate->format('d-m-Y');
            case 'US' : return $ObjDate->format('Y-m-d');
            default : return 'Le format demandé n\'est pas géré';
        }
}

echo dateConvert('05-05-2017','us');