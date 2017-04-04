$('document').ready(function(){

    
// Page d'accueil    
    
    // Burger menu 
    $('.homePage h1 + a').click(function(e){

        // Bloquer comportement par defaut de a
        e.preventDefault();

        // slideToggle() sur a
        $('nav').slideToggle();

    });

    //Navigation
    $('.homePage nav a').click(function(e){

        e.preventDefault();

        var lien = $(this).attr('href');
        
        $('nav').slideUp(function(){
            // changer de page
           window.location = lien;
           
        });
    });

// Page about

    //Capter le click sur le burger menu
    $('.aboutPage h1 + a').click(function(e){

        e.preventDefault();
        
        $('.aboutPage nav').animate({
            left: '0'
        });
    });

    //Navigation
    $('.aboutPage nav a').click(function(e){

        e.preventDefault();

        var lien = $(this).attr('href');
        
        $('.aboutPage nav').animate({
            left: '-100%'
            },function(){
                // changer de page
                window.location = lien;           
        });
    });
    
    

}); // Fin de chargement du DOM