// Demander à l'utilisateur de choisir une couleur entre rouge, vert, bleu

var userChoice = prompt('choisir une couleur entre rouge, vert ou bleu');

// Si userChoice est égale à 'rouge'
if (userChoice == 'rouge') {
    console.log('Rouge se dit Red en anglais');
} else if (userChoice == 'vert') {
    console.log('Vert se dit Green en anglais');
} else if (userChoice == 'bleu') {
    console.log('Bleu se dit Blue en anglais');
} else {
    console.log('Veuillez entrer une couleur valide !!!');
};