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
                if(lien == "about.html"){
                    var valueBar = $('h3+ul>li>p');
                    for (i=0;i<valueBar.length;i++){
                        var valuePercent = $(valueBar[i]).children('span').attr('data-percent')+'%';
                        console.log(valuePercent);
                        $(valueBar[i]).animate({'width': valuePercent});
                        $(valueBar[i]).children('span').text($(valueBar[i]).children('span').text()+' '+valuePercent);
                    };
                };
           });
        });
    });

}); // Fin de chargement du DOM