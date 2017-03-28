/*

    Créer une application pour calcuer une moynne
    - l'utilisateur à la possibilité d'ajouter autant de notes qu'il le souhaite
    - lorsqu'il le souhaite, il peut calculer la moyenne des notes

*/ 

// Variables globales

var notesArray = []; // => tableau vide
var notesAmount = 0;

// Fonctions
function addNote(){
    // Demander à l'utilisateur d'ajouter une notes
    var newNote = prompt('Ajouter un note de 0 à 20');

    // Convertir newNote en variable de type number

    // Ajouter la note dans le tableau
    notesArray.push(+newNote); // + remplace parseInt en EcmaScript 6
    console.log(notesArray);

    // Additionner notesAmount et newNote
    notesAmount += +newNote;
    console.log(notesAmount);
};

function average(){
    console.log(notesAmount / notesArray.length);
}
