<?php
include_once 'includes/header.php';
require_once 'functions.php';
?>

    <div id="main">
        <h1>Añadir clientes</h1>
            <p>Introduce los datos del cliente</p>
        <form action="crud/save_cliente.php" method="POST">
            <label for="nombre">Nombre del cliente</label>
            <input type="text" name="nombre" placeholder="Nombre del cliente...">

            <label for="apellidos">Apellidos del cliente</label>
            <input type="text" name="apellidos" placeholder="Apellidos del cliente...">

            <label for="cp">Código Postal</label>
            <input type="text" name="cp" placeholder="Código Postal...">

            
            <br/>
            <input type="submit" value="Crear">
        </form>
    </div>