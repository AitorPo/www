<?php
//Conexion
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'blog_master';

$db = mysqli_connect($server, $username, $password, $database);

//para que cuando llegue un caracter especial (acentos, eñes...) se pueda interpretar correctamente
mysqli_query($db, "SET NAMES 'utf8'");

//iniciamos sesion para gestionar errores
if(!isset($_SESSION)){
    session_start();
}
?>