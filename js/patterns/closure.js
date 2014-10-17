/* 
este es el patron de clausura, se usa una funcion autoimvocada (una funcion contenida entre parentesis que luego se ejecuta con otros parentesis)
haciendo esto, uso el scope de la funcion como namespace para opacar variables y funcionalidad y no colisionar con otros scripts
se pueden usar los argumentos para pasar las variables globales que quiero usar o extender
notaran el ; al inicio, sirve para asegurar que si este script es incluido despues de otro, cierro una potencial linea abierta 
sino simplemente es una sentencia vacia
*/


;(function (window) {
    // lo que pase aqui adentro, se queda aqui adentro
})(window);