var persona = (function () {
    var personas = [];

    function privada () {
        return "solamente me vas a ver desde la clase persona";
    };

    function clasePersona (nombre, apellido) {
        var name = nombre,
            lastname = apellido;

        function nombreCompleto () {
            return name + " " + lastname;
        };

        // de esta manera defino que al momento de invocar una propiedad, puedo
        // invocar una funcion
        this.__defineGetter__("name", function () { return name; })
        this.__defineSetter__("name", function (value) { name = value; })
        this.__defineGetter__("lastname", function () { return lastname; })
        this.__defineSetter__("lastname", function (value) { lastname = value; })

        // defino una funcion publica
        this.saludar = function () {
            return "Hola Mundo, soy " + nombreCompleto();
        };

        if (this instanceof clasePersona) personas.push(this);
    };

    clasePersona.personas = function () {
        return personas;
    };

    return clasePersona;
})();

var empleado = (function (padre) {

    function claseEmpleado (nombre, apellido, puesto) {
        var puesto = puesto || "administrativo";
        padre.apply (this, arguments);

        this.__defineGetter__("puesto", function () { return puesto; });
        this.__defineSetter__("puesto", function (value) { puesto = value; });
    };

    // Herencia!
    claseEmpleado.prototype = Object.create(padre);
    claseEmpleado.prototype.constructor = claseEmpleado;

    /*for (var prop in padre) {
        if (padre.hasOwnProperty(prop)) {
            claseEmpleado[prop] = padre[prop];
        };
    };*/

    return claseEmpleado;
})(persona);

var yo = new empleado("Jorge", "Capoduri", "vago");
var otro = new persona("alfonso", "rodriguez");
var otro2 = new persona("pocho", "La pantera");

console.log(yo.saludar());
console.log(persona.personas());
console.log(JSON.stringify(yo));
