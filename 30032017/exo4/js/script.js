// Sélectionner la balise h1

var myTitle = document.querySelector('h1');

// Afficher le contenu de la balise dans la console
console.log(myTitle.textContent);

// modifier le contenu texte de la balise
myTitle.textContent = 'Le titre à changé';

// Séléctionner la balise #myId

var myId = document.querySelector('#myId');

// Afficher le contenu HTML dans la console
console.log(myId.innerHTML);

// Modifier le contenu HTML de ma balise
myId.innerHTML='Contactez <b>moi</b> les gars : <a href="mailto:juju.juju.com">Mail</a>';