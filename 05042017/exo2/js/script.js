$('document').ready(function(){

// Page d'accueil    
    // Burger menu 
    $('h1 + a').click(function(e){

        // Bloquer comportement par defaut de a
        e.preventDefault();

        // slideToggle() sur a
        $('nav').slideToggle();

    });

    //Navigation
    $('nav a').click(function(e){

        e.preventDefault();

        var lien = $(this).attr('href');
        
        $('nav').slideUp(function(){
            // changer de page
           $('main').load('views/'+lien,function(){
               var valueBar = $('h3+ul>li>p');
               for (i=0;i<valueBar.length;i++){
                    $(valueBar[i]).animate({'width': $(valueBar[i]).children('span').attr('data-percent')+'%'});
               };
           });
        });
    });

}); // Fin de chargement du DOM