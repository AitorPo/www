<?php
//variables para conectarnos a la BD
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'foro';

//conexion a la BD
try{
$db = new PDO("mysql:host=$host;dbname=$database",$user,$password);
//seteamos el modo de error de las excepciones de PDO
$db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die("ERROR: No se ha podido conectar a la Base de datos " . $e->getMessage());
}

if($db === false){
    die("ERROR: No se ha podido establecer conexión con la BD. ".$db -> connect_error);
}
//iniciamos sesión. También nos servirá para gestionar errores
if(!isset($_SESSION)){
    session_start();
}
?>