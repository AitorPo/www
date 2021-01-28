<?php 
require_once '../includes/connection.php';
require_once '../crud/functions.php';

$nombreViejo = $_GET['update'];
$nombre = $_POST['nombre'];

$sql_update = "UPDATE parque SET nombre = :nombre 
WHERE nombre = :nombre1"; 
$stmt = $db -> prepare($sql_update);
$stmt -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
$stmt -> bindParam(':nombre1', $nombreViejo, PDO::PARAM_STR);

$stmt -> execute();
header('Location: ../parques.php');
?>

