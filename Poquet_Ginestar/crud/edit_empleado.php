<?php 
require_once '../includes/connection.php';
require_once '../functions.php';

$id = $_GET['update'];
$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$password = $_POST['password'];

$bcrypted_password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);


$sql_update = "UPDATE empleados SET Nombre = :nombre, usuario = :usuario, password = :contra WHERE idEmpleado = :id"; 
$stmt = $db -> prepare($sql_update);
$stmt -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
$stmt -> bindParam(':usuario', $usuario, PDO::PARAM_STR);
$stmt -> bindParam(':contra', $bcrypted_password, PDO::PARAM_STR);
$stmt -> bindParam(':id', $id, PDO::PARAM_INT);

$stmt -> execute();
header('Location: ../empleados.php');
?>
