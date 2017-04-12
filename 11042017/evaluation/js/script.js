$(document).ready(function(){

    /* Modification de l'image du chat lors du changement de select */
    $('#choix').change(function(){
        $('#imageChat').attr('src',$(this).val());
    });

    /* retrait de la classe error lors du focus sur un champ en erreur */
    $('#choix,#raison').focus(function(){
        $(this).removeClass();
    });

    /* Affichage de l'information de bonne reception lors le validation du formulaire */
    $('button').click(function(){
        $('div').fadeOut(function(){
            $('form').fadeIn();
        });
        
    });

    /* Vérification des champs lors de la saisie du formulaire */
    $('form').submit(function(e){
        e.preventDefault();
        var formScore = 0;
        /* Vérification de la valeur du select */
        if($('#choix').val() == 'null'){
            /* Si selection non effectée passer le champ en erreur*/
            $('#choix').addClass('error');
        } else {
            /* Sinon incémenter le score du formulaire */
            formScore++;
        };

        /* Vérification de la valeur du textarea */
        if($('#raison').val().length < 15){
            /* Si valeur chaine entrée inférieure à 15 caractéres passer le champ en erreur */
            $('#raison').attr('class','error');
        } else {
            /* Sinon incémenter le score du formulaire */
            formScore++;
        }

        if(formScore == 2){
            /* Si score du formulaire = à 2 alors afficher message de validation et vider le formulaire */
            $('form').fadeOut(function(){
                $('div').fadeIn();
            });
            $('#imageChat').attr('src','img/chat_0.jpg');
            $('form')[0].reset();
        }
    });
}); /* DOM Chargé */ 