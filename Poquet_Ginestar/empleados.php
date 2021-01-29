<?php 
    include_once 'includes/header.php';
    require_once 'functions.php';
?>
<div id="main">
    <h1>Todos los empleados</h1>
    <a href="create_empleado.php"><h4>Nuevo empleado</h4></a>
    <?php 
        $empleados = getEmpleados($db);

        if(!empty($empleados)):
            foreach($empleados as $empleado):
               // var_dump($empleado);
                //die();

    ?>
    <div id="cliente">
        <h2>Empleado: <?=$empleado['Nombre']?></h2>
        <span><?=$empleado['usuario']?></span>
        <div id="links">
            <a href="./crud/delete_empleado.php?id=<?=$empleado['idEmpleado']?>"  
            onclick="return confirm('¿Deseas eliminar?');">Eliminar </a>
            <a href="update_empleado.php?update=<?=$empleado['idEmpleado']?>"> Actualizar</a>
        </div>
    </div>
    <?php endforeach;
        endif;?>
</div>


<?php include_once 'includes/footer.php';?>