<?php
/*
Crear sesion que aumente su valor en uno o disminuya en uno en funcion del parametro get counter de la URL
*/
session_start();

//creamos la session 'numero'
//si NO EXISTE (        if(!isset(...))        )
if (!isset($_SESSION["numero"])) {
    $_SESSION = 0;
}


if (isset($_GET['counter']) && $_GET['counter'] == 1) {
    $_SESSION['numero']++;
}


if (isset($_GET['counter']) && $_GET['counter'] == 0) {
    $_SESSION['numero']--;
}
?>

<h1>El valor de la sesión es: <?=$_SESSION['numero']?></h1>
<a href="sesiones.php?counter=1">Aumentar valor</a><br />
<a href="sesiones.php?counter=0">Decrementar valor</a><br />
<a href="sesiones.alt.php">Ver valor de la sesión</a>