<?php 
require_once 'includes/connection.php';
//require_once '../crud/functions.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud básico de prueba</title>
</head>
<body>
    <header>
        <div id="title">
            <a href="index.php"> 
                Crud básico de prueba
            </a>
        </div>

        <nav id="menu">
            <ul>
                <li>
                    <a href="parques.php">Ver parques</a>
                </li>    
                <li>
                    <a href="create_parque.php">Añadir</a>
                </li>
            </ul>
        </nav>
    </header>
    <!-- container ends at footer.php -->
    <div id="container">