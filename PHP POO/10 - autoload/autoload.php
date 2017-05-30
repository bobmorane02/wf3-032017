<?php

function inclusion_automatique($nom_classe){
    require($nom_classe.'.class.php');

    #---------------------
    echo "On passe dans l'autoload<br>";
    echo "On fait un require($nom_classe.class.php)<br>";
}

#-------------------------------------------
spl_autoload_register('inclusion_automatique');
#-------------------------------------------

/*
    spl_autoload_register :
        - C'est une fonction trés pratique ! Elle s'execute à chaque fois de l'interpréteur voit le mot "new'.
        - Elle va exécuter une function dont on fourni le nom en argument
        - Elle va apporter à notre fonction le mot qui vient aprés 'new' c'est à dire le nom de la classe
          à instancier.
*/