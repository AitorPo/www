<?php
include_once 'includes/header.php';
require_once 'crud/functions.php';
?>

    <div id="main">
        <h1>Añadir parque</h1>
            <p>Introduce los datos del parque</p>
        <form action="crud/save_parque.php" method="POST">
            <label for="nombre">Nombre del parque</label>
            <input type="text" name="nombre" placeholder="Nombre del parque...">

            <label for="ciudad">Ciudad</label>
            <select name="ciudad">
                <?php
                    $ciudades = getCiudades($db);
                    foreach($ciudades as $ciudad):
                ?>
                <option><?=$ciudad['nombre']?></option>
                <?php endforeach;?>
            </select>
            <br/>
            <input type="submit" value="Crear">
        </form>
    </div>