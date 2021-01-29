<?php
include_once 'includes/header.php';
require_once 'functions.php';
?>

    <div id="main">
        <h1>Añadir empleado</h1>
            <p>Introduce los datos del empleado</p>
        <form action="crud/save_empleado.php" method="POST">
            <label for="nombre">Nombre del empleado</label>
            <input type="text" name="nombre" placeholder="Nombre del empleado...">

            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" placeholder="Usuario...">

            <label for="password">Contraseña</label>
            <input type="password" name="password" placeholder="Contraseña...">

            
            <br/>
            <input type="submit" value="Crear">
        </form>
    </div>