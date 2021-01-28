<?php 
require_once 'includes/connection.php';
require_once 'errors.php';
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
        <?php if(isset($_SESSION['operario']) && $_SESSION['operario'] != null):?>
        <nav id="menu">
            <ul>
                <li>
                    <a href="parques.php">Ver parques</a>
                </li>    
                <li>
                    <a href="create_parque.php">Añadir</a>
                </li>
                <li>
                    <a href="logout.php">Cerrar sesión</a>
                </li>
            </ul>
        </nav>
        
        <?php else: return;?>    
        <?php endif;
        deleteErrors();
        ?>
    </header>
    <!-- container ends at footer.php -->
    <div id="container">