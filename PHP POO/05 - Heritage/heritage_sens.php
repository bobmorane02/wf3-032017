<?php

// Transitivité : Si une classe B hérite d'une classe A et qu'une classe C hérite de
// la classe B, alors C hérite de la classe A.

class A {
    public function testA(){
        return 'testA';
    }
}

// --------------------------
class B extends A{
    public function testB(){
        return 'testB';
    }
}

// --------------------------
class C extends B{
    public function testC(){
        return 'testC';
    }    
}

// --------------------------
$c = new C;

echo $c->testA().'<br>';    // méthode A accessible par C (héritage indirect)
echo $c->testB().'<br>';    // méthode B accessible par C (héritage direct)
echo $c->testC().'<br>';    // méthode C accessible par C

echo'<pre>';var_dump(get_class_methods($c));echo'</pre>'; // Affiche les 3 méthodes, car elles appartiennent toutes à C

/*
    Transitivité :
        Si B hérite de A
         et que C hérite de B
            ... alors C hérite de A
        Les méthodes protected de A sont également disponibles dans C, même si l'héritage est indirect.

    l'Héritage est :
        - non reflexif : class D extend D : une classe ne peut pas hériter d'elle même.
        - non-symétrique : si classe F extends de E, alors E n'est pas extends de F automatiquement
        - sans cycle : si classe F extends E , alors il est impossible que E extends F.
        - non multiple : classe N extends M,P : Impossible en PHP. Pas d'héritage multiple en PHP !

        UNe classe parent (mére) peut avoir un nombre infini d'héritiers.
*/