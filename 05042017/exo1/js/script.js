$(document).ready(function(){

    // Capter le click sur le premier bouton
    $('button:first').click(function(){

        // Charger le contenu de vews/about.html dans la premiére section du main
        $('section').eq(0).load('views/about.html',function(){

            // Callback de la fontion load()
            // Animer la premiére section
            $('section').eq(0).fadeIn();
        });        
    });

    // Charger le click sur le deuxieme button
    $('button').eq(1).click(function(){

        // Charger dans la deuxieme section le contenu de l'Id portfolio de views/content.html
        $('section').eq(1).load('views/content.html #portfolio');
    });

    // Charger le click sur le troisieme button
    $('button').eq(2).click(function(){
        // Charger dans la troisieme section le contenu de l'Id contacts de views/content.html
        $('section').eq(2).load('views/content.html #contacts',function(){
            submitForm();
        });
    });

    //creer une function pour capter la soumission du formulaire

    function submitForm(){
        // Capter la soumission du formulaire
        $('form').submit(function(e){
            e.preventDefault();

            var formScore = 0;
            
            // Minimum 4 caractéres pour l'Email et 5 caratéres pour le message
            if($('[type="email"]').val().length < 4){
                console.log('Email non valide');
            } else {
                formScore++;
                console.log('Email OK');
            };

            if($('textarea').val().length < 5){
                console.log('Message trop court');
            } else {
                formScore++;
                console.log('Message OK');
            };
            console.log(formScore);
            
            if (formScore == 2){
                console.log('Formulaire valide');
                
                // -> Envoi des données vers le serveur
                // -> Le serveur répond ok -> je continu mon code

                // Ajouter le message dans une balise <aside>
                $('aside').append('<h3>'+$('textarea').val()+'</h3><p>'+$('[type="email"]').val()+'</p>');

                // Reset du formulaire
                $('form')[0].reset();
            };
        });
    }

});