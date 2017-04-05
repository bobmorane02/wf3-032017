$(document).ready(function(){

    // Capter le click sur le premier bouton

    $('button:first').click(function(){
        // Charger le fichier home.html dans le main
        $('main').load('localhost:3000/views/home.html');
    });

});