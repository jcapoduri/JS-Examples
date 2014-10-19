function personClass (nombre, apellido) {
    // todo lo definido aca sera oculto desde el punto de vista de quien use el objeto
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
    }
};

yo = new personClass();
yo.name = "Jorge";
yo.lastname = "Capoduri";
console.log(yo.saludar());
console.log(JSON.stringify(yo));