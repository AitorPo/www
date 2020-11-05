<?php

//inicio de sesion
session_start();
//variable local
$variable_normal = "Soy una cadena de texto";
//variable de sesion
$_SESSION['variable_persistente'] = "HOLA SOY UNA SESION ACTIVA";

echo $variable_normal.'<br/>';
echo $_SESSION['variable_persistente'].'<br/>';;
?>