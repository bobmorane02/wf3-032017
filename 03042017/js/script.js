// attendre le chargement du DOM
$('document').ready(function(){

    // Créer un tableau vide pour enregistrer les avatars
    var myTown = [];

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
        // Modifier l'attribut src de #avatarBody
        $('#avatarBody').attr('src','img/'+avatarGender+'.png');
    });

    $(avatarMan).click(function(){
        // désactiver avatarWoman
        avatarWoman.prop('checked',false);
        // modifier la valeur de avatarGender
        avatarGender = avatarMan.val();
        // Vider le message d'erreur
        $('.labelGender b').text('');
        // Modifier l'attribut src de #avatarBody
        $('#avatarBody').attr('src','img/'+avatarGender+'.png');      
    });    
    
    //
    $('select').change(function(){
        
        // Condition if pour modifier la valeur src de avatarTop ou avatarStyleBottom
        if($(this).attr('id') == 'avatarStyleTop'){
            $('#avatarTop').attr('src','img/top/'+$(this).val()+'.png');
        } else {
            $('#avatarBottom').attr('src','img/bottom/'+$(this).val()+'.png');
        };
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
        if( avatarGender == undefined){
            $('.labelGender b').text('Vous devez choisir un genre');
        } else {
            formValid++;
        };

        // Validation finale : vérifier formValid
        if (formValid == 5){
            
            // Envoyer les données au serveur et attendre la réponse du serveur.

            // Ajouter une ligne dans le tableau HTML
            $('table').append(''+
            '<tr>'+
                '<td><b>'+avatarName+'</b></td>'+
                '<td>'+avatarAge+'</td>'+
                '<td>'+avatarGender+'</td>'+
                '<td>'+avatarStyleTop+', '+avatarStyleBottom+'</td>'+
            '</tr>'
            );

            // Ajouter l'avatar dans le tableau JS
            myTown.push({
                name:   avatarName,
                age:    parseInt(avatarAge),
                gender: avatarGender,
                style:  avatarStyleTop+' ,'+avatarStyleBottom
            });

            // Vider les champs du formulaire
            $('form')[0].reset();
            avatarGender = undefined;
            
            // Revenir au valeurs 'null' pour l'avatarAge
            $('#avatarBody').attr('src','img/null.png');
            $('#avatarTop').attr('src','img/top/null.png');
            $('#avatarBottom').attr('src','img/bottom/null.png');

            // Afficher la taille totale de la ville dans total sims
            $('#totalSims').text(myTown.length);

            // Faire une boucle for sur myTown pour connaitre les stats
            var totalBoys = 0;
            var totalGirls = 0;
            var totalAge = 0;

            for(i=0;i<myTown.length;i++){
                // Condition pour le genre
                if(myTown[i].gender == 'girl'){
                    totalGirls++;
                    totalAge = totalAge+myTown[i].age;
                } else {
                    totalBoys++;
                    totalAge = totalAge+myTown[i].age;
                };
            };

            // Afficher dans le tableau HTML le nombre de girls et de totalBoys
            $('#simsWoman').html(totalGirls+'<b>/'+myTown.length+'</b>');
            $('#simsMan').html(totalBoys+'<b>/'+myTown.length+'</b>');

            // Afficher la moyenne d'age
            $('#simsAgeAmount').html(Math.round(totalAge/myTown.length)+'<b> ans</b>');
        };

    });

});// Fin de chargemnt du DOM