// Sélectionner la balise h1
var myTitle = document.querySelector('h1');

// Ajouter une class à la balise h1
myTitle.classList.add('error');

// Sélectionner la derniére balise p
var myLastP = document.querySelector('p:last-of-type');

// Supprimer la classe hidden
myLastP.classList.remove('hidden');

// Sélectionner la balise button
var myButton = document.querySelector('button');

// Sélectionner la premiére balise h2
var myFirstH2 = document.querySelector('h2');

//Capter le click sur le bouton
myButton.onclick = function(){
    // Ajouter ou supprimer la classe move sur la premiere balise h2
    myFirstH2.classList.toggle('move');
};