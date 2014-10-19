function personClass (nombre, apellido) {
    // todo lo definido aca sera oculto desde el punto de vista de quien use el objeto
    var name = nombre,
        lastname = apellido;

    function nombreCompleto () {
        return name + " " + lastname;
    };

    // de esta manera defino que al momento de invocar una propiedad, puedo
    // invocar una funcion
    this.__defineGetter__("name", function () { return name; });
    this.__defineSetter__("name", function (value) { name = value; });
    this.__defineGetter__("lastname", function () { return lastname; });
    this.__defineSetter__("lastname", function (value) { lastname = value; });

    // defino una funcion publica
    this.saludar = function () {
        return "Hola Mundo, soy " + nombreCompleto();
    };

    personClass.personas = personClass.personas || [];
    personClass.listaPersona = function () {
        return this.personas;
    };

    personClass.personas.push(this);
};

function empleado (nombre, apellido, puesto) {
    var puesto = puesto || "administrativo";
    personClass.apply (this, arguments);

    this.__defineGetter__("puesto", function () { return puesto; });
    this.__defineSetter__("puesto", function (value) { puesto = value; });
}

//heredo el prototype para no perder
empleado.prototype = personClass.prototype;

var yo = new empleado("Jorge", "Capoduri", "vago");
var otro = new personClass("alfonso", "rodriguez");
var otro2 = new personClass("pocho", "La pantera");

console.log(yo.saludar());
console.log(personClass.listaPersona());
console.log(JSON.stringify(yo));

