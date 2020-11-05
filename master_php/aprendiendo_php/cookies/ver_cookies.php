<?php
//Para mostrar el valor de las cookies tenemos que usar $_COOKIE (variable superglobal accesible desde todas las 
//paginas del proyecto) y es un array asociativo ('key','value')

//comprobamos si la cookie existe y actuamos
if(isset($_COOKIE['mi_cookie'])){
    echo '<h1>'.$_COOKIE['mi_cookie'].'</h1>';
}else {
    echo 'La cookie no existe';
}

if(isset($_COOKIE['one_year'])){
    echo '<h1>'.$_COOKIE['one_year'].'</h1>';
}else {
    echo 'La cookie no existe';
}

?>

<a href="borrar_cookies.php">Borrar cookies</a>
<br />
<a href="crear_cookies.php">Volver a crear cookies</a>