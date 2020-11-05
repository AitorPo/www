<?php
//inicio de sesion en todos los ficheros en los que usemos la variable global $_SESSION
session_start();

echo$_SESSION['variable_persistente'].'<br/>';
?>