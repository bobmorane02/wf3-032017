/*
    Programme pour saluer un utilisateur et afficher sont année de naissance
        - Demander le nom et prénom de l'utilisateur
        - Saluer en disant : Bonjour prénom nom
        - Demander l'âge de l'utilisateur
        - Afficher l'année de naissance
*/ 

// Demander le nom et prénom de l'utilisateur
var firstName = prompt('Quel est ton prénom ? :');
var lastName =  prompt('Quel est ton nom ? :');

// Saluer en disant : Bonjour prénom nom
console.log('Bonjour '+firstName+' '+lastName);

// Demander l'âge de l'utilisateur
var age = parseInt(prompt('Quel est ton âge ? :'));
var currentYear = 2017;

console.log('Ton année de naissance est : '+ (currentYear - age));