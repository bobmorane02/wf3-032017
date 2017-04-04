$('document').ready(function(){

    // Ouvrir le Burger menu classique
    $('.fa-bars').click(function(){
        $('nav ul').fadeIn(500);
    });

    // Fermer le burger menu
    $('a').click(function(e){
        e.preventDefault();
        $('nav ul').fadeOut(500);
    });

}); // Fin de chargement du DOM