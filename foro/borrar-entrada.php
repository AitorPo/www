<?php 
//iniciamos sesion y conectamos con la BD
require_once 'includes/conexion.php';
if(isset($_SESSION['usuario']) && $_GET['id']){
    $entrada_id = $_GET['id'];
    $usuario_id = $_SESSION['usuario']['id'];
    $sql = $db -> prepare("DELETE FROM entradas WHERE usuario_id = $usuario_id AND id = $entrada_id");
    $sql -> execute();
}

header('Location: index.php');
?>