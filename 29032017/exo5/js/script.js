/*
    Créer une fonction qui permet à l'utilisateur de choisir une couleur
*/ 
var userChoice ='';

function chooseColor(){

    // Demander à l'utilisateur de choisir une couleur
    var userPrompt = prompt('Choisissez une couleur entre rouge, vert ou bleu');

    // Assigner la valeur de userPrompt à userChoice
    userChoice = userPrompt;

    // Appeler la fonction de traduction
    translateColor(userChoice);

};

// Créer une fonction pour traduire les couleurs

function translateColor(paramColor){
        if (paramColor == 'rouge') {
            console.log('Rouge se dit Red en anglais');
        } else if (paramColor == 'vert') {
            console.log('Vert se dit Green en anglais');
        } else if (paramColor == 'bleu') {
            console.log('Bleu se dit Blue en anglais');
        } else {
            chooseColor();
        };
};