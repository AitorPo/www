<?php
//variables para conectarnos a la BD
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'foro';

//conexion a la BD
$db = mysqli_connect($host, $user, $password, $database);

//línea para poder interpretar caracteres especiales
mysqli_query($db, "SET NAMES 'utf8'");

//iniciamos sesión. También nos servirá para gestionar errores
if(!isset($_SESSION)){
    session_start();
}
?>