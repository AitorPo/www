<?php 
require_once '../includes/connection.php';
require_once '../functions.php';

$id = $_GET['update'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];

$sql_update = "UPDATE productos SET Nombre = :nombre, Precio = :precio 
WHERE idProducto = :id"; 
$stmt = $db -> prepare($sql_update);
$stmt -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
$stmt -> bindParam(':precio', $precio, PDO::PARAM_STR);
$stmt -> bindParam(':id', $id, PDO::PARAM_INT);

$stmt -> execute();
header('Location: ../productos.php');
?>
