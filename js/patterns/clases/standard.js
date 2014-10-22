function personClass (nombre, apellido) {
    // todo lo definido aca sera oculto desde el punto de vista de quien use el objeto
    var name = nombre,
        lastname = apellido;

    function nombreCompleto () {
        return name + " " + lastname;
    };

    // de esta manera defino que al momento de invocar una propiedad, puedo
    // invocar una funcion
    this.__defineGetter__("nombre", function () { return name; })
    this.__defineSetter__("nombre", function (value) { name = value; })
    this.__defineGetter__("lastnombre", function () { return lastname; })
    this.__defineSetter__("lastnombre", function (value) { lastname = value; })

    // defino una funcion publica
    this.saludar = function () {
        return "Hola Mundo, soy " + nombreCompleto();
    }
};

yo = new personClass();
yo.nombre = "Jorge";
yo.lastnombre = "Capoduri";
console.log(yo.saludar());
console.log(JSON.stringify(yo));