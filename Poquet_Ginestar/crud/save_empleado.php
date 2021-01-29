<?php
require_once '../includes/connection.php';
require_once '../functions.php';


$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];


$errors = array();

trim($nombre);
if(empty($nombre)){
    $errors['nombre'] = 'El titulo NO es válido';
}

if(count($errors) == 0){
         $bcrypted_password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

        $sql_insert = "INSERT INTO empleados (Nombre, usuario, password) VALUES(:nombre, :usuario, :password)";
        $stmt = $db -> prepare($sql_insert);
        $stmt -> bindParam(':nombre', $nombre, PDO::PARAM_STR );
        $stmt -> bindParam(':usuario', $usuario, PDO::PARAM_STR );
        $stmt -> bindParam(':password', $bcrypted_password, PDO::PARAM_STR );
        
        $stmt -> execute();
        header('Location: ../empleados.php');
   
}else{
    $_SESSION['input_errors'] = $errors;
    //redireccion a la misma pagina en la que estabamos si ha ocurrido algun error
  

}
?>