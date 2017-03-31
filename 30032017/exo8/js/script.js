// Attendre le chargement du DOM
$(document).ready(function(){

    // Code à executer sur la page une fois celle-ci chargée

    /*
        Supersélecteur
    */

    var superSelector = $('h3').prev().parent().parent().next().parent().find('main').children('article').find('h3');
    console.log('Balise sélectionnée : ', superSelector);

    /*
        Les sélecteur JQuery "classiques" 
    */

    // Sélection une/des balise par son nom (tag)
    var myHtmlTag = $('header');
    console.log(myHtmlTag);

    // Sélectionner une/des balise par sa classe
    var myClass = $('.myClass');
    console.log(myClass);

    // Sélectionner une/des balise par don id
    var myId = $('#myId');
    console.log(myId);

    // Sélecteur imbriqué
    var myItalic = $('h2 i');
    console.log(myItalic);

    // Sélecteur CCS3
    var myFooter = $('body > main + footer');
    console.log(myFooter);
    
    /*
        Sélecteurs JQuery spécifiques
    */

    // Sélecteur d'enfants
    var myChildren = $('header').children('button');
    console.log(myChildren);

    // Sélecteur de parents
    var myParent = $('h2').parent();
    console.log(myParent);

    // Trouvé une balise
    var myH2 = $('main').find('h2');
    console.log(myH2);

    // Sélectionner le premier

    var firstBtn =$('button:first');
    console.log(firstBtn);

    // Sélectionner le dernier
    var lastBtn =$('button:last');
    console.log(lastBtn);

    // Sélectionner la nth balise
    var secondLi = $('li').eq(1);
    console.log(secondLi);

    // Sélectionner la balise suivant
    var aferMain = $('main').next();
    console.log(aferMain);

    // Sélectionner la balise précédente
    var beforeMain = $('main').prev();
    console.log(beforeMain);

    var test =  $('html').find('h2');
    console.log(test);


}); // Fin de la fonction d'attente du chargement du DOM