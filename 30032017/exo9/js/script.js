// Capter l'événement ready pour y ajouter une fonction de callback

$(document).ready(function(){

    // Capter l'événement focus sur le textarea
    $('textarea').focus(function(){
        console.log('Minimum 10 Caractéres');
    });

    // Capter l'événement blur sur le textarea
    $('textarea').blur(function(){
        console.log('L\'utilisateur est sorti du textarea');
    });

    // Capter l'évenement scroll sur le header
    $('header').scroll(function(){
        console.log('Scroll');
    });

    // Capter l'évenement hover sur le main
    $('main').hover(function(){
        console.log('hover');
    });

    // Capter le clic sur une balise a
    $('a').click(function(e){

        // empécher le comportement naurel de la balise a
        e.preventDefault();
        console.log('Clique sur balise a');

    })

    // Capter la soumission du formulaire
    $('form').submit(function(e){
        // Bloquer le comportement naturel du formulaire
        e.preventDefault();

        console.log('Vérifier les inputs/textarea avant de les envoyer au fichier PHP');

    })

}); // Fin de chargement du DOM