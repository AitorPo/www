<?php 
require_once '../includes/connection.php';
require_once '../functions.php';

$id = $_GET['update'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$cp = $_POST['cp'];


$sql_update = "UPDATE clientes SET nombre = :nombre, apellidos = :apellidos, codPostal = :cp 
WHERE idCliente = :id"; 
$stmt = $db -> prepare($sql_update);
$stmt -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
$stmt -> bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
$stmt -> bindParam(':cp', $cp, PDO::PARAM_INT);
$stmt -> bindParam(':id', $id, PDO::PARAM_INT);

$stmt -> execute();
header('Location: ../clientes.php');
?>
