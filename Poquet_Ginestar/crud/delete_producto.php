<?php
require_once '../includes/connection.php';
//require_once '';

$id = $_GET['id'];
// var_dump($nombre);
// die();
$sql_delete_producto = "DELETE FROM productos WHERE idProducto = :id";
$stmt_delete = $db -> prepare($sql_delete_producto);
$stmt_delete -> bindParam(':id',$id, PDO::PARAM_INT);
$stmt_delete -> execute();

header('Location: ../productos.php');

?>