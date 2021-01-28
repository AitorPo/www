<?php
//variables para conectarnos a la BD
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'parques';

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
    //var_dump($_SESSION); //el valor es null/undefined porque aún no se ha iniciado ninguna sesión
    if(!isset($_SESSION)){
        //Se inicia el "concepto" de sesión
        session_start(); 
        // El valor de la sesión ['user'] se asigna en el fichero login
        
        //die();
    }
?>