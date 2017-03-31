$(document).ready(function(){

    // Capter la soumission du formulaire
    $('form').submit(function(e){
        // Définir un vriable pour le score du formulaire
        var formScore = 0;

        // Bloquer le conportement naturel du formulaire
        e.preventDefault();

        // Connaitre la valeur saisie par l'utilisateur
        var userName = $('input').val();
        console.log(userName);

        // Connaitre le nombre de caratéres
        console.log(userName.length);

        // Connaitre la valeur saisie dans le textarea
        var userMessage = $('textarea').val();

        // Connaitre le nombre de caratéres
        console.log(userMessage.length);        

        // Verifier la taille de username (min 1 caratéres)
        if(userName.length == 0){
            $('[for="username"] b').text('Minimum 1 caractére');
        } else {
            formScore++;
        };

        // Verifier la taille de usermessage (min 5 caratéres)
        if(userMessage.length < 5){
            $('[for="usermessage"] b').text('Minimum 5 caractére');
        } else {
            formScore++;
        };

        // Vérifier la valeur de formScore pour valider le formulaire
        if(formScore==2){
            console.log('Le formulaire est valide');

            // Envoyer les données au PHP et attendre la réponse de celui-ci
            // si le PHP répond true!
            // Vider les champs du formulaire
            $('[name="username"]').val('');
            $('textarea').val('');
        };
        // Supprimer les messages d'erreur
        $('input,textarea').focus(function(){
            $(this).prev().children('b').text('');
        })
        // Ajouter le message dans la liste
        $('section:last').append('<article><h4>'+userMessage+'</h4><p>'+userName+'</p></article>');

    });
}); // fin de charger du DOM