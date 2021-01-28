<?php
    include_once 'includes/header.php';
    require_once './crud/functions.php';

    $current_parque = getParque($db, $_GET['nombre']);
    if(!isset($current_parque['nombre'])){
        header('Location: index.php');
    }
?>

    <div id="main">
        <h1>Editar parque</h1>

        <form action="./crud/edit_parque.php?update=<?=$current_parque['nombre']?>" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="<?=$current_parque['nombre']?>">

            <br/>
            <input type="submit" value="Actualizar">
        </form>
    </div>

<?php 
    include_once 'includes/footer.php';
?>