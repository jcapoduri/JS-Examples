// Vamos a probar como funcionan los scopes en js

var soyGlobal = "al ser declarado en el documento raiz, mi scope es window o global";
otroGlobal = "al ser declarado sin el operador var, soy global!";

// vamos a declarar una funcion (tmb) global para hacer 
function exp2(n) {
    yoTmbSoyGlobal = "mucho cuidado conmigo, sin el operador var, por mas que este en una funcion, soy una variable global!";
    // declaro una variable y no la inicializo, o sea es una referencia nula o como la disatingue js, Undefined
    var tmp; 
    tmp = n*n;
    return tmp;
};

// wow! uso una variable global para guardar un objeto global. Es raro, pero completamente legal
// cosas de js
exp3 = function (n) {
    // de nuevo, mucho cuidado conmigo, en el scope de esta funcion, yo no estoy declarado
    // al usarme me declaras implicitamente, por ende soy global;
    tmp = n*n*n;
    return tmp;
    
};

function faulty(n) {
    return n*q;
    // bien, en la funcion anterior tenia como lvalue una variable no declarada, asique se crea dinamicamente
    // pere este caso, intento acceder a una variable no declara, por ende va a fallar en tiempo de ejecucion ;(
}

//esta otra funcion intentara (en vano) modificar el valor del elemento que es pasado como argumento en la fn
function makeIt10(value) {
    value = 10;
}

var number = 5;
console.log("valor de number:" + number);
console.log("valor de soyGlobal:" + soyGlobal);
//aca no pregunto por yoTmbSoyGlobal porque iba a fallar
console.log("valor de yoTmbSoyGlobal:" + (typeof yoTmbSoyGlobal)); //typeof <objeto> de que tipo es

makeIt10(number);

console.log("valor de number despues de makeIt: " + number);

console.log("valor de exp2:" + exp2(number));
console.log("valor de number:" + number);
console.log("valor de yoTmbSoyGlobal:" + yoTmbSoyGlobal);

console.log("valor de exp3:" + exp3(number));
console.log("valor de number:" + number);
//Aca vemos un error garrafal de scope
console.log("valor de tmp:" + tmp);
console.log("y por ultimo, voy a fallar :)");
console.log(faulty(number));