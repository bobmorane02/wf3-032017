/*
    Ajouter un balise HTML dans le DOM
    - Sélectionner le document
    - Appliquer la fonction write
    - Ajouter le contenu
*/ 

document.write('<p>Balise ajoutée en JavaScript</p>');

var names = ['Pierre','Paul','Jacques','Robert'];

    for (var i=0;i<names.length;i++){
        document.write('<p>Salut '+names[i]+'</p>');
    };