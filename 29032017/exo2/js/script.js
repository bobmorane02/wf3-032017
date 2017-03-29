var myNumber = 45;

// Egalité simple
console.log(myNumber==45);      // égalité simple -> true
console.log(myNumber=='45');    // égalité simple -> true

// Inégalité simple
console.log(myNumber!=45);      // inégalité simple -> false
console.log(myNumber!='45');    // inégalité simple -> false


// Egalité stricte: vérifier la valeur ET le type de la variable
console.log(myNumber===45);     // égalité stricte -> true (type et valeur identiques)
console.log(myNumber==='45');   // égalité stricte -> false (type différent)

// Inegalité stricte: vérifier la valeur ET le type de la variable
console.log(myNumber!==45);     // égalité stricte -> false (type et valeur identiques)
console.log(myNumber!=='45');   // égalité stricte -> true (type différent)

// Supérieur/Inférieur
console.log(myNumber>46);       // false
console.log(myNumber<46);       // true

// Supérieur ou égale / Inférieur ou égale
console.log(myNumber>=12);      // true
console.log(myNumber<=20);      // false

console.log(myNumber>=45);      // true
console.log(myNumber<=45);      // true