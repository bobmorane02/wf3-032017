// Créer un tableau contenant 4 prénoms
var users = ['John','Paul','George','Ringo'];

// Saluer chacun des prénoms dans la console

// boucle for
for (var i=0;i<users.length;i++){
    console.log('Salut '+users[i]);
};

// boucle while
var i=0;
while(i<users.length){
    console.log('Salut '+users[i]);
    i++;
};

// boucle for ... in object
var myObj = {
    first   : 'John',
    second  : 'Paul',
    third   : 'George',
    fourth  : 'Ringo'
};

for (var prop in myObj){
    console.log(prop+': '+myObj[prop]); //<-- particuliérement débile mais c'est comme ça !
};