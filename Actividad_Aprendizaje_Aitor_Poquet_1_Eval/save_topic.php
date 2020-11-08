<?php 
if(isset($_POST)){
//conectamos con la BD
require_once 'includes/connection.php';

$title = $_POST['title'];
$content = $_POST['content'];
$user = $_SESSION['user'];

//array de errores
$errors = array();

if(empty($title)){
    $errors['title'] = 'El titulo NO es válido';
}
//
#nos aparece un espacio en blanco en el textarea (no se porque) por eso hacemos trim() 
#para eliminarlo y que funciona el programa correctamente
trim($content);
//
if(empty($content)){
    $errors['content'] = 'El contenido NO es válido';
}

if(count($errors) == 0)
$sql_insert = "INSERT INTO topics VALUES(null, ?, CURDATE(), ?, ?)";
$stmt = $db -> prepare($sql_insert);
$stmt -> bindParam(1, );


}

?>