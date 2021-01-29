<?php 
    include_once 'includes/header.php';
    require_once 'functions.php';
?>
<div id="main">
    <h1>Todos los clientes</h1>
    <a href="create_cliente.php"><h4>Nuevo cliente</h4></a>
    <?php 
        $clientes = getClientes($db);

        if(!empty($clientes)):
            foreach($clientes as $cliente):
               // var_dump($cliente);
                //die();

    ?>
    <div id="cliente">
        <h2>Cliente: <?=$cliente['nombre']?></h2>
        <span><?=$cliente['apellidos']?></span>
        <div id="links">
            <a href="./crud/delete_cliente.php?id=<?=$cliente['idCliente']?>"  
            onclick="return confirm('¿Deseas eliminar?');">Eliminar </a>
            <a href="update_cliente.php?update=<?=$cliente['idCliente']?>"> Actualizar</a>
        </div>
    </div>
</div>
    <?php endforeach;
        endif;?>
</div>


<?php include_once 'includes/footer.php';?>