/*
    Créer un tableau contenant 4 index
    - 1 string
    - 1 number
    - 2 booleans différents
*/ 

var myTab = ['Bonjour',53,true,false];
console.log(myTab);

/*
    Ajouter un string dans le tableau.
    Afficher le tableau.
*/ 

myTab.push('Robert');
console.log(myTab);

/*
    Afficher dans la console la tailledu tableau
    Afficher chacun le premier et le dernier du tableau dans la console
*/ 

console.log(myTab.length,myTab[0],myTab[4]);

/*
    Créer un objet contenant 3 propriétés 
    - le tableau
    - prénom
    - age
*/ 

var MyObject = {
        table : myTab,
        firstName:'Roger',
        age:45
     }

     console.log(MyObject);

// Afficher toutes le propriétés de l'objet dans la console 

console.log(MyObject.table,MyObject.firstName,MyObject.age);

// Modifier la propriété age de l'objet et afficher l'objet dans la console

MyObject.age = 25;
console.log(MyObject);