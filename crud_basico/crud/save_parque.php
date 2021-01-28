<?php
require_once '../includes/connection.php';
require_once '../crud/functions.php';


//die();

//die();
$nombre = $_POST['nombre'];

$errors = array();

trim($nombre);
if(empty($nombre)){
    $errors['nombre'] = 'El titulo NO es válido';
}

//
#nos aparece un espacio en blanco en el textarea (no se porque) por eso hacemos trim() 
#para eliminarlo y que funciona el programa correctamente


if(count($errors) == 0){
    
    $ciudad = $_POST['ciudad'];
    var_dump($ciudad);
        
$idCiudad = getIdCiudad($db, $ciudad);
var_dump($idCiudad);
         
        $sql_insert = "INSERT INTO parque (nombre, id_ciudad) VALUES(:nombre, (SELECT id_ciudad FROM ciudad WHERE nombre = :ciudad))";
        $stmt = $db -> prepare($sql_insert);
        $stmt -> bindParam(':nombre', $nombre, PDO::PARAM_STR );
        $stmt -> bindParam(':ciudad', $ciudad, PDO::PARAM_STR );
        
        $stmt -> execute();
        header('Location:../parques.php');
   
}else{
    $_SESSION['input_errors'] = $errors;
    //redireccion a la misma pagina en la que estabamos si ha ocurrido algun error
  

}
?>