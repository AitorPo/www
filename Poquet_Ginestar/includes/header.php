<?php 
require_once 'includes/connection.php';
//require_once 'errors.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen Aitor Poquet</title>
</head>
<body>
    
    <header>
        <div id="title">
            <a href="index.php"> 
                Examen Desarrollo de interfaces Aitor Poquet
            </a>
        </div>
        <!-- <?php var_dump($_SESSION['empleado'])?> -->
        <?php if(isset($_SESSION['empleado'])): ?>
        <nav id="menu">
            <ul>
                <li>
                    <a href="clientes.php">Clientes</a>
                </li>    
                <li>
                    <a href="productos.php?page=1">Productos</a>
                </li>
                <li>
                    <a href="empleados.php">Empleados</a>
                </li>
            </ul>
        </nav>
       <?php endif; ?>
    </header>
</body>
</html>