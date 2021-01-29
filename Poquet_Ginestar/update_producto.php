<?php
    include_once 'includes/header.php';
    require_once 'functions.php';

    $current_producto = getProducto($db, $_GET['update']);
    
    if(!isset($current_producto['idProducto'])){
        header('Location: productos.php');
    }
?>

    <div id="main">
        <h1>Editar producto</h1>

        <form action="./crud/edit_producto.php?update=<?=$current_producto['idProducto']?>" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="<?=$current_producto['Nombre']?>">
            <label for="precio">Precio</label>
            <input type="text" name="precio" value="<?=$current_producto['Precio']?>">

            <br/>
            <input type="submit" value="Actualizar">
        </form>
    </div>

<?php 
    include_once 'includes/footer.php';
?>