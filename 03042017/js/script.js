// attendre le chargement du DOM
$('document').ready(function(){

    // Vérifier le genre de l'avatarAge
    var avatarWoman = $('#avatarWoman');
    var avatarMan = $('#avatarMan');
    var avatarGender;

    // => capter le click sur avatarWoman et avatarMan
    $(avatarWoman).click(function(){
        // désactiver avatarMan
        avatarMan.prop('checked',false);
        // modifier la valeur de avatarGender
        avatarGender = avatarWoman.val();
        // Vider le message d'erreur
        $('.labelGender b').text('');
    });

    $(avatarMan).click(function(){
        // désactiver avatarWoman
        avatarWoman.prop('checked',false);
        // modifier la valeur de avatarGender
        avatarGender = avatarMan.val();
        // Vider le message d'erreur
        $('.labelGender b').text('');          
    });    
    
    // Supprimer les messages d'erreur
    $('input,select').focus(function(){
        //Séléctionner la balise précédente
        $(this).prev().children('b').text('');
    });

    // Capter la soumission du formulaire
    $('form').submit(function(e){

        // bloquer le comportement le comportement par defaut du formulaire
        e.preventDefault();

        // Variables Globales
        var avatarName = $('#avatarName').val();
        var avatarAge = $('#avatarAge').val();
        var avatarStyleTop = $('#avatarStyleTop').val();
        var avatarStyleBottom = $('#avatarStyleBottom').val();
        var formValid = 0;
        
        // Vérifier les champs du formulaire
            // => avatarName ninimum 5 caratéres
        if(avatarName.length < 5){
            $('[for="avatarName"] b').text('Min. 5 caractéres');
        } else {
            formValid++;
        };

                // => avatarAge entre 1 et 100
        if(avatarAge<1 || avatarAge >100 || avatarAge == ''){
            $('[for="avatarAge"] b').text('Hors limites');
        } else {
            formValid++;
        };

        // => avatarStyleTop obligatoire
        if(avatarStyleTop == 'null'){
            $('[for="avatarStyleTop"] b').text('Vous devez choisir un Haut');
        } else {
            formValid++;
        };

        // => avatarStyleBottom obligatoire
        if(avatarStyleBottom == 'null'){
            $('[for="avatarStyleBottom"] b').text('Vous devez choisir un Bas');
        } else {
            formValid++;
        };

        // => avatarGender vérifier la valeur
        console.log(avatarGender);
        if( avatarGender == undefined){
            $('.labelGender b').text('Vous devez choisir un genre');
        } else {
            formValid++;
        };

        // Validation finale : vérifier formValid
        console.log(formValid);
        if (formValid == 5){
            
            // Envoyer les données au serveur et attendre la réponse du serveur.

            // Vider les champs du formulaire

            console.log('Formulaire OK');
            $('form')[0].reset();
        }; 
                  
    });

});// Fin de chargemnt du DOM