$('document').ready(function(){

    // Ouvrir la modale
    $('button').click(function(){
        $('section').fadeIn();
    });

    // Fermer la modale
    $('.fa').click(function(){
        $('section').fadeOut();
    });

    // Capter les touches du clavier
    $(document).keydown(function(e){
        if (e.keyCode == 27){
            $('section').fadeOut();
        }
    });

}); // Fin de chargement du DOM