/*
    - Créer un tableau contenant 4 prénoms
    - Faire une boucle sur le tableau pour saluer chaque prénom

    - Afficher un message special pour votre prénom "(c'est moi)"
*/ 

var myArray = ['Robert','Luc','Jean','Christophe'];

for (var i=0;i<myArray.length;i++){
    if (myArray[i]=='Robert'){
        document.querySelector('p').textContent = 'Bonjour '+myArray[i]+' (c\'est moi)';
        console.log('Bonjour '+myArray[i]+' (c\'est moi)');
    } else {
        console.log('Bonjour '+myArray[i]);
    }
};