<?php
require_once '../includes/connection.php';
require_once '../crud/functions.php';


$nombre = $_POST['nombre'];
$ciudad = $_POST['ciudad'];


$errors = array();

trim($nombre);
if(empty($nombre)){
    $errors['nombre'] = 'El titulo NO es válido';
}
//
#nos aparece un espacio en blanco en el textarea (no se porque) por eso hacemos trim() 
#para eliminarlo y que funciona el programa correctamente

if(empty($ciudad)){
    $errors['ciudad'] = 'El contenido NO es válido';
}

if(count($errors) == 0){
    
        $sql_ciudad = "SELECT id_ciudad FROM ciudad WHERE nombre = ?";
        $stmt_ciudad = $db -> prepare($sql_ciudad);
        $stmt_ciudad -> bindParam(1, $ciudad, PDO::PARAM_STR );
        $stmt_ciudad -> execute();
        $idCiudad = $stmt_ciudad -> fetch(PDO::FETCH_ASSOC);
        // var_dump($idCiudad);
        // die();
        $sql_insert = "INSERT INTO parque (nombre, id_ciudad) VALUES(?,?)";
        $stmt = $db -> prepare($sql_insert);
        $stmt -> bindParam(1, $nombre, PDO::PARAM_STR );
        $stmt -> bindParam(2, $idCiudad, PDO::PARAM_INT );
        
        
        
        $stmt -> execute();
        header('Location:../parques.php');
   
}else{
    $_SESSION['input_errors'] = $errors;
    //redireccion a la misma pagina en la que estabamos si ha ocurrido algun error
  

}
?>