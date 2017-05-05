<?php
/*
    1-  Créer une fonction qui retourne la convertion d'une date FR en date US ou inversement.
        Cette fontion prend 2 paramétres : une date valide et le format de conversion "US" ou "FR"

    2-  Vous validez que le paramétre de format est bien "US" ou "FR". La fonction retourne un message si ce n'est
        pas le cas.
*/

function dateConvert($date,$format) {
        switch (strtoupper($format)) {
            case 'FR' : return strftime('%d-%m-%Y',strtotime($date));
            case 'US' : return strftime('%Y-%m-%d',strtotime($date));
            default : return 'Le format demandé n\'est pas géré';
        }
}

echo dateConvert('2017-05-05','fr');