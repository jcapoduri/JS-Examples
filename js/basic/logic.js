//vamos a ver como funcionan las igualdades y que signifiac falsy y truly
// btw, se pueden definir las variables como una lista separada por comas, quedando mas practica la definicion de variables
var cero = 0,
    nocero = 5,
    verdadero = true,
    falso = false,
    stringvacio = "",
    stringnovacio = "5",
    arrayvacio = [],
    arraynovacio = ["que", "buena", "onda"],
    objetovacio = {},
    objectocomplejo = {
        name: "solo un nombre, no desespereis",
        ref: arraynovacio,
        objhijo: {
            prop1: 5,
            prop2: "laaa",
            prop3: Date()
        },
        number: 5
    },    
    copyobjetovacio = objetovacio,
    objetovacio2 = {},
    lanadamisma;

console.log("------------- vamos a probar valores de verdad ---------");
console.log("cero == nocero: " + (cero == nocero));
console.log("cero != nocero: " + (cero != nocero));
console.log("nocero == stringnovacio: " + (nocero == stringnovacio));
console.log("nocero === stringnovacio: " + (nocero === stringnovacio));
console.log("nocero != stringnovacio: " + (nocero != stringnovacio));
console.log("nocero !== stringnovacio: " + (nocero !== stringnovacio));

console.log("false == lanadamisma: " + (false == lanadamisma));
console.log("false === lanadamisma: " + (false === lanadamisma));
console.log("false != lanadamisma: " + (false != lanadamisma));
console.log("false !== lanadamisma: " + (false !== lanadamisma));

console.log("true == lanadamisma: " + (true == lanadamisma));
console.log("true === lanadamisma: " + (true === lanadamisma));
console.log("true != lanadamisma: " + (true != lanadamisma));
console.log("true !== lanadamisma: " + (true !== lanadamisma));

console.log("stringvacio == arrayvacio: " + (stringvacio == arrayvacio));
console.log("stringvacio === arrayvacio: " + (stringvacio == arrayvacio));
console.log("stringvacio == cero: " + (stringvacio == cero));
console.log("stringvacio === cero: " + (stringvacio === cero));
console.log("arrayvacio == cero: " + (arrayvacio == arrayvacio));
console.log("arrayvacio === cero: " + (arrayvacio === arrayvacio));