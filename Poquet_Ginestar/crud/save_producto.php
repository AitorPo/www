<?php
require_once '../includes/connection.php';
require_once '../functions.php';


$nombre = $_POST['nombre'];
$precio = $_POST['precio'];

$errors = array();

trim($nombre);
if(empty($nombre)){
    $errors['nombre'] = 'El titulo NO es válido';
}

if(count($errors) == 0){
    
    $categoria = $_POST['categoria'];
    var_dump($categoria);
        
$idCategoria = getIdCategoria($db, $categoria);
var_dump($idCategoria);
         
        $sql_insert = "INSERT INTO productos (Nombre, Precio, idCategoria) VALUES(:nombre, :precio, (SELECT idCategoria FROM categorias WHERE Descripcion = :descripcion))";
        $stmt = $db -> prepare($sql_insert);
        $stmt -> bindParam(':nombre', $nombre, PDO::PARAM_STR );
        $stmt -> bindParam(':precio', $precio, PDO::PARAM_STR );
        $stmt -> bindParam(':descripcion', $categoria, PDO::PARAM_STR );
        
        $stmt -> execute();
        header('Location: ../productos.php');
   
}else{
    $_SESSION['input_errors'] = $errors;
    //redireccion a la misma pagina en la que estabamos si ha ocurrido algun error
  

}
?>