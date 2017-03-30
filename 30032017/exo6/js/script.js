// Sélectionner la balise dans laquelle ajouter une autre balise
var myMain = document.querySelector('main');

// Créer un tableau contenant 4 titres
var myArray =['<h2>Accueil</h2>',
              '<h2>About</h2>',
              '<h2>Portfolio</h2>',
              '<h2>Contacts</h2>'];

// Faire une boucle sur le tableau
for(i=0;i<myArray.length;i++){
    // Créer une variable pour génerer une balise HTML
    var myNewTag = document.createElement('section');

    // Ajouter du contenu dans la balise générée
    myNewTag.innerHTML = myArray[i];

    // Ajouter un enfant dans myMain
    myMain.appendChild(myNewTag);
};