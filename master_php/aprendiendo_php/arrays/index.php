<?php
$peliculas = array('Batman', 'El señor de los anillos', 'Avengers');
var_dump($peliculas);
var_dump($peliculas[2]);
echo $peliculas[1];
$videojuegos = ['Wow', 'WC3', 'The Witcher 3'];
var_dump($videojuegos);
echo $videojuegos[1];

//creamos una lista para recorrer el array con for
echo '<ul>';
echo '<h1>Listado de videojuegos -> FOR</h1>';
#count() sirve para saber el tamaño de un array
for ($i=0; $i < count($videojuegos); $i++) { 
    echo '<li>'.$videojuegos[$i].'</li>';
}
echo '</ul>';

//creamos lista para recorrer el array con foreach
echo '<ul>';
echo '<h1>Listado de videojuegos -> FOREACH</h1>';
foreach ($videojuegos as $videojuego) {
    echo '<li>'.$videojuego.'</li>';
}

echo '</ul>';

//array asociativo --> asociamos un valor al indice del array (key => value)
$heroes = array('nombre' => 'Illidan',
                'raza' => 'Elfo de la noche',
                'edad' => 'Desconocida' 
                );
var_dump($heroes['nombre']);
echo $heroes['raza'];

//podemos hacer var_dump de los parametros que pasemos por URl
var_dump($_GET);

//array multidimensional
$contactos = array(
    array('nombre' => 'Aitor',
        'email' => 'aitor@g.com'),
    array('nombre' => 'Poquet',
        'email' => 'poquet@g.com'),
    array('nombre' => 'Ginestar',
        'email' => 'ginerstar@g.com'),
);
var_dump($contactos);
echo '<h2>'.$contactos[1]['nombre'].'</h2>';

foreach ($contactos as $contacto) {
    echo $contacto['email'].'<br>';
    var_dump($contacto['email']);
}
?>

