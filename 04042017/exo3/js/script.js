$('document').ready(function(){

   $('h3').click(function(){

    // fermer la balise suivant .open
    $('.open').not(this).next().slideUp().prev().removeClass('open').children('.fa').toggleClass('fa-arrow-right').toggleClass('fa-times');

    // Faire un toggle de la classe open sur la balise h3
    $(this).toggleClass('open');

    // Faire un slideToggle() sur la balise suivante
    $(this).next().slideToggle();

    // Sélectionner la balise .fa pour supprimer la classe .fa-arrow-right et la remplacer par .fa-times
    $(this).children('.fa').toggleClass('fa-arrow-right').toggleClass('fa-times');

   });

}); // Fin de chargement du DOM