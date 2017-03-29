/*
    Le Chifoumy
    - l'utilisateur doit choisir entre pirre, feuille et ciseaux
    - l'ordinateur doit choisir entre pirre, feuille et ciseaux
    - comparer le choix de l'utilisteur et de l'ordinateur
    - Selon le choix l'utilisteur ou l'ordinateur à gagné
    - une partie ce joue en 3 manches
*/ 

/*
    l'utilisateur doit choisir entre pirre, feuille et ciseaux
    - Créer une fonction qui prend en paramétre le chois de l'utilisateur
    - Appeler la fonction au clique sur les boutons du DOM en précisant le paramétre
    - Afficher le résultat dans la console
*/ 

// variable globale pour le choix de l'utilisteur
var userBet = '';
var userWin = 0;
var computerWin = 0;

function userChoice(paramChoice){
    userBet = paramChoice;
};

/*
    l'ordinateur doit choisir entre pirre, feuille et ciseaux
    - faire une fonction pour déclencher le choix au clique sur un bouton
    - Créer un tableau contenant 'pierre', 'feuille' et 'ciseaux'
    - Choix aléatoire d'une des valeur du tableau
    - Afficher le résultat dans la console
*/

function computerChoice(){
    var computerMemory =['pierre','feuille','ciseaux'];
    var result = document.querySelector('p');
    
    // Choisir aléatoirement un des trois index du tableau
    var computerBet = computerMemory[Math.floor(Math.random()*computerMemory.length)];
    if (userBet != ''){
            // Afficher les deux choix dans la balise h2
            document.querySelector('h2').textContent = userBet+' vs '+computerBet;
        
            // Comparer les variables
        
            if (userBet == computerBet){
            } else if (userBet == 'pierre' && computerBet == 'ciseaux'){
                userWin++; 
            } else if (userBet == 'feuille' && computerBet =='pierre'){
                userWin++;
            } else if (userBet == 'ciseaux' && computerBet =='feuille'){
                userWin++;
            } else {
                computerWin++;
            };
    } else {
        document.querySelector('h2').textContent = 'Veuillez faire un choix !';
    };
    // afficher les valeurs de computerWin et userWin dans la console
    if(userWin == 3){
        document.querySelector('body').innerHTML = '<h1>Gagné</h1><a href="index.html">Rejouer</a>';
    };

    if(computerWin == 3){
        document.querySelector('body').innerHTML = '<h1>Perdu</h1><a href="index.html">Rejouer</a>';
    };
};

