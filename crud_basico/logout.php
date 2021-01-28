<?php 
session_start();

if(isset($_SESSION['operario'])){
    session_destroy();
}

header('Location: index.php');
?>