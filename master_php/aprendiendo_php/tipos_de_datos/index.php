<?php

$int = 100;
echo $int." ".gettype($int)."<br/>";

$double = 22.34;
echo $double." ".gettype($double)."<br/>";

$string = "texto";
echo $string." ".gettype($string)."<br/>";

$boolean_true = true;
echo $boolean_true." ".gettype($boolean_true)."<br/>";

//no muestra nada porque el resultado es 0
$boolean_false = false;
echo $boolean_false." ".gettype($boolean_false)." (No muestra nada porque el valor es false, es decir, 0)"."<br/>";

$null = null;
echo $null." ".gettype($null)."<br/>";

echo "<h1>Concatenar dentro de variables</h1>";
$texto = "Texto para concatenar la variable $int con comillas dobles. El servidor tarda más en procesar las comillas dobles";
echo $texto;
echo "<br/>";
$texto = 'Texto para concatenar la variable '.$int.' con comillas simples. El servidor tarda menos a procesar las comillas simples';
echo $texto;
echo "<br/>";
$texto = "Texto para imprimir comillas dobles (\"\") dentro de un string";
echo $texto;

echo "<h1>Debug</h1>";
$mi_nombre = "Aitor Poquet Ginestar";
var_dump($mi_nombre);

$array[] = 23;
$array[] = 345;
$array[] = 567;
var_dump($array);
?>