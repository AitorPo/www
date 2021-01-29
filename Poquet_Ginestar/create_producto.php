<?php
include_once 'includes/header.php';
require_once 'functions.php';
?>

    <div id="main">
        <h1>Añadir producto</h1>
            <p>Introduce los datos del producto</p>
        <form action="crud/save_producto.php" method="POST">
            <label for="nombre">Nombre del producto</label>
            <input type="text" name="nombre" placeholder="Nombre del producto...">

            <label for="precio">Precio del producto</label>
            <input type="text" name="precio" placeholder="Precio del producto...">

            <label for="categoria">Categoría</label>
            <select name="categoria">
                <?php
                    $categorias = getCategorias($db);
                    foreach($categorias as $categoria):
                ?>
                <option><?=$categoria['Descripcion']?></option>
                <?php endforeach;?>
            </select>
            <br/>
            <input type="submit" value="Crear">
        </form>
    </div>