// Créer un type d'objet pour en faire des déclinaisons
function CarType(paramDoors,paramColor,paramBrand,paramGear){
    // des portes, une couleur, marque, boite de vitesses
    this.doors = paramDoors;
    this.color = paramColor;
    this.brand = paramBrand;
    this.gear = paramGear;
    this.welcome = function(){
        console.log('Bonjour, je suis une '+this.brand+', je posséde '+this.doors+' portes et '+this.gear+' vitesse et je suis de couleur '+this.color);
    };
};

// Ajouter une fonction au type d'objet CarType
/* CarType.prototype.welcome = function(){

    console.log('Bonjour, je suis une '+this.brand+', je posséde '+this.doors+' portes et '+this.gear+' vitesse et je suis de couleur '+this.color);

};*/

// Créer une déclinaison de CarType

var  fiat = new CarType(3,'Rouge','Fiat',4) ;
console.log(fiat);

var hummer = new CarType(5,'Noir','American Dream',8);
console.log(hummer);

hummer.welcome();
fiat.welcome();