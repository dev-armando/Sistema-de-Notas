<?php 



/*
	Ejemplo de formulario con AJAX, AngularJS y PHP
	@author parzibyte
*/

/*
	Leemos el flujo que hay en php://input
	Como codificamos los datos con JSON al enviarlos,
	al recibirlos tenemos que decodificarlos de la misma manera.

	Para ello, PHP provee el método json_decode: http://php.net/manual/es/function.json-decode.php
*/
$mascota = json_decode(file_get_contents("php://input"));

# Ahora mascota sigue siendo un objeto, con propiedades. 
# Podemos acceder a ellas dependiendo de cómo las hayamos nombrado en el lado del cliente

$nombre = $mascota->nombre;



$mensaje = "Nombre: $nombre " . PHP_EOL; //Concatenar y poner salto de línea 

file_put_contents("mascotas.txt", $mensaje, FILE_APPEND);

/*
	Ojo aquí: no hacer return, sino echo
*/

# Si nos mandaron los datos con JSON, respondamos con JSON ;)
echo json_encode($mensaje);
