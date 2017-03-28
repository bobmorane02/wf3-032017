//  Créer un fonction sans paramétres

function helloWorld(){

    // Ecrire le code à executer à l'appel de la fonction

    console.log('Hello World!');
};

// Appeler la fonction
helloWorld();

// Créer une fonction avec paramétres

function fullName(firstName,lastName){
    console.log('Bonjour '+firstName+' '+lastName);
};

// Appeler la fonction en précisant les paramétres
fullName('Robert','Kowalczyk');
fullName('Julien','Noyer');
fullName('Mathieu','Nebra');