$(document).ready(function(){

    // Manipuler le contenu texte du footer
    // console.log($('footer').text());
    // $('footer').text('Sous licence MIT');

    // Manipuler le contenu HTML du footer
    // console.log($('footer').html());
    $('footer').html('sous la licence <b>MIT</b>');

    // Créer un objet pour la page d'accueil
    var content = {
        homeContent : {
            title   :   'Bienvenu sur mon site',
            content :   'Je suis le texte de la page <b>Accueil</b>'
        },

        portfolioContent : {
            title   :   'Bienvenu sur mon Portfolio',
            content :   'Je suis le texte de la page <b>Portfolio</b>'
        },

        contactContent : {
            title   :   'Bienvenu sur la page Contact',
            content :   'Je suis le texte de la page <b>Contact</b>'
        }
    };
    // Capter le click sur le premiére  balise li
    $('li').click(function(){
        //console.log($(this).attr('data'));
        var temp = $(this).attr('data');
        console.log(temp);
        // Modifier le contenu de la balise h2
        $('h2').text(content.temp.title);

        // Modifier le contenu de la balise p
        $('p').html(content.temp.content);
    });

}); // Fin de chargement du DOM