<?php
$videojuegos = ['Wow', 'WC3', 'The Witcher 3', 'Ark Survival'];
$numeros = [1, 3, 4, 6, 8, 45, 78];

//orden alfabético
asort($videojuegos);
var_dump($videojuegos);

//orden alfabético inverso
arsort($videojuegos);
var_dump($videojuegos);

//orden alfabético y numérico
sort($numeros);
var_dump($numeros);

//añadir elementos al array
$videojuegos[] = 'HoTS';
var_dump($videojuegos);
array_push($videojuegos, 'Fury');
var_dump($videojuegos);

//eliminar el ultimo indice
array_pop($videojuegos);
var_dump($videojuegos);

//eliminar un indice concreto
unset($videojuegos[3]);
var_dump($videojuegos);

//obtener un indice aleatorio del array
$indice = array_rand($videojuegos);
echo $videojuegos[$indice];

//invertir el array
var_dump(array_reverse($videojuegos));

//buscar dentrod e un array
$resultado = array_search('WC3',$videojuegos);
var_dump($resultado);
var_dump($videojuegos[$resultado]);

//contar nº de elementos del array
echo 'count() '.count($videojuegos);
echo '<br/>';
echo 'sizeof() '.sizeof($videojuegos);
?>