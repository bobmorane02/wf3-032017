// Attendre le chargement du DOM

$(document).ready(function(){

    // Créer une variable pour le titre principal du site
    var siteTitle = 'Robert Kowalczyk <span>Etudiant Intégrateur/développeur WEB<\span>';
    // Créer un tableau pour la nav
    var myNav = ['Accueil','Portfolio','Contacts'];

    // Créer un objet pour les titres des pages
    var myTitles = {
        Accueil     : 'Bienvenue sur la page d\'accueil',
        Portfolio   : 'Découvrez mes travaux',
        Contacts    : 'Contactez moi pour plus d\'informations'
    };

    // Créer un objet pour le contenu des pages
    var myContent = {
        Accueil     : '<h3>Contenu de la page Accueil</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem praesentium quis quae atque voluptas, molestiae fugiat fugit, consequatur, porro sapiente quod magnam vitae esse, repellat maiores cum laborum sed. Voluptatibus!</p>',
        Portfolio   : '<h3>Contenu de la page Portfolio</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo adipisci explicabo quisquam mollitia, sunt quod placeat. Rerum vel impedit, fugit sint dolor et similique iusto pariatur quis. Est, praesentium modi!</p>',
        Contacts    : '<h3>Contenu de la page Contact</h3><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet quaerat non minus cum, officiis harum mollitia blanditiis, illo placeat aut magni. Fugit unde sunt reprehenderit, dicta pariatur nulla soluta sapiente.</p>'
    };

    // Sélectionner le header et le mettre dans une variable
    var myHeader = $('header');

    // Générer une balise h1 dans le header avec le contenu de la variable siteTitle
    myHeader.append('<h1>'+siteTitle+'<\h1>');

    // Générer une balise nav+ul dans le header
    myHeader.append('<nav><ul></ul></nav>');
{/*<i class="fa fa-bars" aria-hidden="true"></i>*/}
    // Activer le burgermenu au click sur .fa-bars
    $('.fa-bars').click(function(){
        $('ul').toggleClass('showUl');
        $('nav').toggleClass('show');
    });

    // Faire une boucle for... sur myNav pour générer les liens de la nav
    for (var i=0;i<myNav.length;i++){
        $('ul').append('<li><a href="'+myNav[i]+'">'+myNav[i]+'</a></li>');
    };

    // Afficher dans le main le titre issu de l'objet myTitles
    var myMain = $('main');
    myMain.append('<h2>'+myTitles.Accueil+'</h2>');
    myMain.append('<section>'+myContent.Accueil+'</section>');
    $('[href="Accueil"]').addClass('active');

    // Capter l'événement click sur les balises a en bloquant le comportement naturel des balises a
    $('a').click(function(e){

        // Bloquer le comportement naturel de la balise a
        e.preventDefault();

        // Connaitre l'occurence de la balise a cliquée
        // console.log($(this));

        // Récupérer la valeur de l'attribut href des balises a
        // console.log($(this).attr('href'));

        // vérifier la valeur de l'attribut href pour afficher le bon titre
        $('a').removeClass('active');
        if($(this).attr('href')=='Accueil'){
            $('[href="Accueil"]').toggleClass('active');
            $('h2').text(myTitles.Accueil);
            $('section').html(myContent.Accueil);
        } else if($(this).attr('href')=='Portfolio'){
            $('[href="Portfolio"]').toggleClass('active');
            $('h2').text(myTitles.Portfolio);
            $('section').html(myContent.Portfolio);
        } else {
            $('[href="Contacts"]').toggleClass('active');
            $('h2').text(myTitles.Contacts);
            $('section').html(myContent.Contacts);
        };

    });

}); // Fin de chargement du DOM