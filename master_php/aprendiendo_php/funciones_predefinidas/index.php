<?php
//Debug
$nombre = "Aitor Poquet";
var_dump($nombre);

//Fechas. Las iniciales deben estar en inglés
echo date('d-M-y');
echo "<br />";
//Fecha y hora en formato UNIX
echo time();
echo "<br />";
//Matemáticas
echo "Raíz cuadrada de 10: ".sqrt(10);
echo "<br />";
echo "Número aleatorio entre 10 y 40: ".rand(10, 40);
echo "<br />";
echo "Número pi: ".pi();
echo "<br />";
echo "Redondeo de 7.891234: ".round(7.891234);
echo "<br />";
echo "Redondeo de 7.891234 con un solo decimal: ".round(7.891234, 1);
echo "<br />";

//Funciones generales
echo gettype($nombre);
echo "<br />";

if (is_string($nombre)) {
    #comprobamos que sea String
    echo "Esa variable es un string";
}
echo "<br />";
if (!is_float($nombre)) {
    #comprobamos que NO sea float
    echo "La variable nombre no es un número con decimales";
}
echo "<br/>";
if (isset($edad)) {
    #comprobamos si una variable existe o no en nuestro programa
    echo "La variable existe";
}else{
    echo "La variable NO existe";
}
echo "<br/>";
$frase = "     Probando la función trim().";
trim($frase);
var_dump($frase);
var_dump(trim($frase));

//Eliminar variables / índices del programa
$year = 2020;
unset($year);

//Comprobar si la variable tiene valor o no
$texto = true;
if (empty($texto)) {
    echo "La variable texto está vacía";
}else{
    echo "La variable echo tiene contenido";
}
echo "<br/>";

//length
$cadena = "123456";
echo strlen($cadena);
echo "<br/>";
$frase = "Hola mundo";
echo strpos($frase, "mun");
echo "<br/>";

//reemplazar palabras de un string
$frase = str_replace("mundo", "moto", $frase);
echo $frase;
echo "<br/>";

//cambiar Mayus por minus
echo strtolower($frase);
echo "<br/>";
echo strtoupper($frase);

?>