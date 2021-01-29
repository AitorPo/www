<?php 
session_start();

if(isset($_SESSION['empleado'])){
    session_destroy();
}

header('Location: index.php');
?>