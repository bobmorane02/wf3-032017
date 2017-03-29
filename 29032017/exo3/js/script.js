var first = 20, second = 20, third = 10;

// ET logique : vérifier que mes deux variables ont la même valeur
console.log(first == 20 && second == 20);   // -> true
console.log(first == 10 && third== 10);     // -> false

// OU logique : vérifier qu'une des variables à la bonne valeur
console.log(first == 20 || second == 20);   // -> true
console.log(first == 20 || third == 10);   // -> true