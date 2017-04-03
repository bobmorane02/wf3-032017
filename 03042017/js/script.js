// attendre le chargement du DOM
$('document').ready(function(){

    // Vérifier le genre de l'avatarAge
    var avatarWoman = $('#avatarWoman');
    var avatarMan = $('#avatarMan');

    // => capter le click sur avatarWoman et avatarMan
    $(avatarWoman).click(function(){
        console.log('je suis une '+avatarWoman.val());
        // désactiver avatarMan
        avatarMan.prop('checked',false);
    });

    $(avatarMan).click(function(){
        console.log('je suis un '+avatarMan.val());
        // désactiver avatarWoman
        avatarWoman.prop('checked',false);
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
        
        // Vérifier les champs du formulaire
            // => avatarName ninimum 5 caratéres
        if(avatarName.length < 5){
            console.log('Min. 5 caractéres');
        } else {
            console.log('avatarName OK');
        };

            // => avatarAge entre 1 et 100
       if(avatarAge<1 || avatarAge >100 || avatarAge == ''){
            console.log('avatarAge hors limites')
        } else {
            console.log('avatarAge OK');
        };

        // => avatarStyleTop obligatoire
        if(avatarStyleTop == 'null'){
            console.log('Vous devez choisir un Haut');
        } else {
            console.log('Haut OK');
        }

        // => avatarStyleBottom obligatoire
        if(avatarStyleBottom == 'null'){
            console.log('Vous devez choisir un Bas');
        } else {
            console.log('Bas OK');
        }             
                  
    });

});// Fin de chargemnt du DOM