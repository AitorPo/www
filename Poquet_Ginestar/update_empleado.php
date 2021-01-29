<?php
    include_once 'includes/header.php';
    require_once 'functions.php';

    $current_empleado = getEmpleado($db, $_GET['update']);
    
    if(!isset($current_empleado['idEmpleado'])){
        header('Location: empleados.php');
    }
?>

    <div id="main">
        <h1>Editar empleados</h1>

        <form action="./crud/edit_empleado.php?update=<?=$current_empleado['idEmpleado']?>" method="POST">
            <label for="nombre">Nombre Completo</label>
            <input type="text" name="nombre" value="<?=$current_empleado['Nombre']?>">
            <label for="usuario">Nombre de usuario</label>
            <input type="text" name="usuario" value="<?=$current_empleado['usuario']?>">
            <label for="password">Contraseña</label>
            <input type="password" name="password" value="<?=$current_empleado['password']?>">

            <br/>
            <input type="submit" value="Actualizar">
        </form>
    </div>

<?php 
    include_once 'includes/footer.php';
?>