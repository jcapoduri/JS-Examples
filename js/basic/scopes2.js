// Vamos a explorar que pasa con distintas invocaciones de funciones y su respectivo scope

var myTest = function () {
    console.log("typeof this: " + typeof this);
    console.log("this: " + this);
};

var value;

console.log("------------------ Probamos ejecutar la funcion sola ----------------");
value = myTest();
console.log("typeof value: " + typeof value);
console.log("------------------ Probamos ejecutar la funcion con new ----------------");
value = new myTest;
console.log("typeof value: " + typeof value);
console.log("------------------ Probamos ejecutar la funcion con new + () ----------------");
value = new myTest();
console.log("typeof value: " + typeof value);

//vamos a jugar con el scope
var myTest2 = function (num) {
    var hiddenVar = "voy a existir dentro del objeto por el mismo scope, pero nunca me vas a poder acceder";
    this.visibleVar = "esta propiedad esta explicitamente vinculada a this, el objeto creado por new, por ende accesible";
    var counter = 0;
    // doble-negacion? nah, otro hattrick de js, significa "que num no sea ni nulo ni falsy";
    if (!!num) counter = num;

    // de nuevo, vinculo una propiedad con una funcion, asique es completamente visible
    this.up = function () {
        counter++;
    };
    this.count = function () { return counter; };

    // function dentro del scope, visible dentro del mismo, desde el objeto completamente inaccesible
    function baja1() {
        counter--;
    };

    // vivan las referencias! una propierdad que vincula a una funcion, acabo de hacer visible una funcion oculta :)
    this.down = baja1;
};

var counter = new myTest2();
console.log("json de counter: " + JSON.stringify(counter));
console.log("estado del contador: " + counter.count());

console.log("llamo a up");
counter.up();

console.log("estado del contador: " + counter.count());

console.log("llamo a up");
counter.down();

console.log("estado del contador: " + counter.count());

console.log("ahora vemos si pasamos 5 como parametro");
var counter = new myTest2(5);
console.log("json de counter: " + JSON.stringify(counter));
console.log("estado del contador: " + counter.count());

console.log("llamo a up");
counter.up();

console.log("estado del contador: " + counter.count());

console.log("llamo a up");
counter.down();

console.log("estado del contador: " + counter.count());

console.log("y si pasamos fruta? (dijamos un 'pomelo')");
var counter = new myTest2('pomelo');
console.log("json de counter: " + JSON.stringify(counter));
console.log("estado del contador: " + counter.count());

console.log("llamo a up");
counter.up();

console.log("estado del contador: " + counter.count());

console.log("llamo a up");
counter.down();

console.log("estado del contador: " + counter.count());

console.log("y como acto final voy a fallar intentando acceder al metodo baja1 al cual no tengo acceso");
counter.baja1();