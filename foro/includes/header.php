<!-- Nos conectamos a la BD -->
<?php require_once 'conexion.php' ;?>
<?php require_once 'includes/helpers.php'?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog de videojuegos</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css" />
</head>
<body>
    <!--CABECERA-->
    <header id="header">
        <!--LOGO-->
        <div id="logo">
            <a href="">
                Blog de videojuegos
            </a>
        </div>

        <!--MENU-->
    <nav id="nav">
        <ul>
            <li>
                <a href=">Inicio</a>
            </li>
            <?php 
                $categorias = getCategorias($db);
                #comprobamos que el array de categorias NO esta vacio
                if(!empty($categorias)) :
                    while($categoria = mysqli_fetch_assoc($categorias)): 
            ?>
                <li>
                    <a href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nombre']?></a>
                </li>
            <?php 
                
                    endwhile;
                endif; 
            ?>
            <li>
                <a href=>Sobre mi</a>
            </li>
            <li>
                <a href=>Contacto</a>
            </li>
        </ul>
    </nav>

    <div class="clearfix"></div>
    </header>

    <!-- INICIO DE CONTAINER (TERMINA EN footer.php)-->
    <div id="container">

    