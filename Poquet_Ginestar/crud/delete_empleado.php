<?php
require_once '../includes/connection.php';
//require_once '';

$id = $_GET['id'];
// var_dump($nombre);
// die();
$sql_delete_empleado = "DELETE FROM empleados WHERE idEmpleado = :id";
$stmt_delete = $db -> prepare($sql_delete_empleado);
$stmt_delete -> bindParam(':id',$id, PDO::PARAM_INT);
$stmt_delete -> execute();

header('Location: ../empleados.php');

?>