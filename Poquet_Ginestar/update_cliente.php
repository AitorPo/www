<?php
    include_once 'includes/header.php';
    require_once 'functions.php';

    $current_cliente = getCLiente($db, $_GET['update']);
    
    if(!isset($current_cliente['idCliente'])){
        header('Location: clientes.php');
    }
?>

    <div id="main">
        <h1>Editar clientes</h1>

        <form action="./crud/edit_cliente.php?update=<?=$current_cliente['idCliente']?>" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="<?=$current_cliente['nombre']?>">
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" value="<?=$current_cliente['apellidos']?>">
            <label for="cp">Código Postal</label>
            <input type="text" name="cp" value="<?=$current_cliente['codPostal']?>">

            <br/>
            <input type="submit" value="Actualizar">
        </form>
    </div>

<?php 
    include_once 'includes/footer.php';
?>