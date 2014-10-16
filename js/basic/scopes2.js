// Vamos a explorar que pasa con distintas invocaciones de funciones y su respectivo scope

var myTest = function () {
    console.log("typeof this: " + typeof this);
    console.log("this: " + this);
};

var value;

value = myTest();
console.log("typeof value: " + typeof value);
value = new myTest;
console.log("typeof value: " + typeof value);
value = new myTest();
console.log("typeof value: " + typeof value);