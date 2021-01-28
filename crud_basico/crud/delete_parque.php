<?php
require_once '../includes/connection.php';
//require_once '';

$nombre = $_GET['nombre'];

$sql_delete_parque = "DELETE FROM parque WHERE nombre = :nombre";
$stmt_delete = $db -> prepare($sql_delete_parque);
$stmt_delete -> bindParam(':nombre',$nombre, PDO::PARAM_STR);
$stmt_delete -> execute();

header('Location: ../parques.php');

?>