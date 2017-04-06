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

    // Créer une fonction pour la gestion du formaulaire
    function contactForm(){

        // Capter le focus sur les inputs
        $('input:not([type="submit"]),textarea').focus(function(){

            //Selectionner la balise précédante pour lui ajouter la classe openedLabel
            $(this).prev().addClass('openedLabel hideError');

        });

        $('select').focus(function(){
            $(this).prev().addClass('hideError');
        });

        $('[type="checkbox"]').click(function(){
            $('form p').addClass('hideError');
        });

        // Capter le blur sur les inputs et le textarea
        $('input,textarea').blur(function(){

            // Selectionner la balise précédente pour supprimer la classe openedLabel
            if($(this).val().length == 0){
                $(this).prev().removeClass();
            };
        });

        // Capter la soumission du formulaire
        $('form').submit(function(e){

            // Bloquer le comportement naturel du formulaire
            e.preventDefault();

            // définir les variables globales du formulaire
            var userName = $('#userName');
            var userEmail = $('#userEmail');
            var userSubject = $('#userSubject');
            var userMessage = $('#userMessage');
            var checkbox = $('[type="checkbox"]');
            var formValid = 0;

            // Vérifier que userName à au minimum 2 caractéres
            if(userName.val().length < 2){
                userName.prev().children('b').text('Nom incorrect');
            } else {
                formValid++;
            };

            // Vérifier que userEmail a au moins 5 caractéres
            if(userEmail.val().length<5){
                userEmail.prev().children('b').text('Email incorrect');
            } else {
                formValid++;
            };

            // Vérifier la séléction d'un sujet
            if(userSubject.val()=='null'){
                userSubject.prev().children('b').text('Sujet incorrect');
            } else {
                formValid++;
            };

            // Vérifier que userEmail a au moins 5 caractéres
            if(userMessage.val().length<5){
                userMessage.prev().children('b').text('Message incorrect');
            } else {
                formValid++;
            };
            
            // Vérifier l'acceptation des CG
            if(!checkbox[0].checked){
                checkbox.parent().children('b').text('Veuillez accepter les CG');
            } else {
                formValid++;
            };
            
            if(formValid == 5){

                // Envoi des données au serveur

                // Ajouter la valeur de userName dan la balise span de la modal
                $('#modal span').text(userName.val());

                // Afficher la modal
                $('#modal').fadeIn();

                //reset du formulaire
                $('form')[0].reset();

                //Supprimer les Message d'erreur
                $('form b').text('');

                //replacer les labels
                $('label').removeClass();
            };


        });
    };

    // fermer la modale

    $('.fa-times').click(function(){
        console.log('click');
    });

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

                if(lien == "portfolio.html"){

                };

                if(lien == "contacts.html" ){
                    //Déclencher la fonction de gestion du formulaire
                    contactForm();

                };

           });

        });
    });

}); // Fin de chargement du DOM