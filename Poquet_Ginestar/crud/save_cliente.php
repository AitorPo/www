<?php
require_once '../includes/connection.php';
require_once '../functions.php';


$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$cp = $_POST['cp'];

$errors = array();

trim($nombre);
if(empty($nombre)){
    $errors['nombre'] = 'El nombre NO es válido';
}

if(count($errors) == 0){
    
        $sql_insert = "INSERT INTO clientes (nombre, apellidos, codPostal) VALUES(:nombre, :apellidos, :cp)";
        $stmt = $db -> prepare($sql_insert);
        $stmt -> bindParam(':nombre', $nombre, PDO::PARAM_STR );
        $stmt -> bindParam(':apellidos', $apellidos, PDO::PARAM_STR );
        $stmt -> bindParam(':cp', $cp, PDO::PARAM_STR );
        
        $stmt -> execute();
        header('Location: ../clientes.php');
   
}else{
    $_SESSION['input_errors'] = $errors;
    //redireccion a la misma pagina en la que estabamos si ha ocurrido algun error
  

}
?>