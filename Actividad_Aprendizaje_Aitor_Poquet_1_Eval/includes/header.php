<?php 
require_once 'includes/connection.php';
require_once 'includes/functions.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foro Aitor Poquet Ginestar</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
</head>
<body>
<!-- HEADER -->
    <header>
        <!-- LOGO -->
        <div id="logo">
            <a href="index.php">
                Foro Aitor Poquet Ginestar
            </a>
        </div>

    <div class="clearfix">
    </div>

     <!-- MENU -->
     <nav id="menu">
        <ul>        
            <li>
            <a href="index.php">Inicio</a>
            </li>
            <?php if(isset($_SESSION['user'])):?>
            <li>
            <a href="create_topic.php">Crear tema</a>
            </li>
            <li>
            <a href="create_category.php">Crear categoría</a>
            </li>   
            <?php endif; ?> 
            <li>
            <a href="categories.php">Ver categorías</a>
            </li>   
    </ul>
    </nav> 
    </header>  
       

  <!-- CONTAINER (ends at footer.php)-->
  <div id="container">