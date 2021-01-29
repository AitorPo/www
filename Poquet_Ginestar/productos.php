<?php 
    include_once 'includes/header.php';
    require_once 'functions.php';
?>
<div id="main">
    <h1>Todos los productos</h1>
    <a href="create_producto.php"><h4>Nuevo producto</h4></a>

    <?php 
        // ********* PAGINACIÓN FUNCIONANDO ************ //
        $page = $_GET['page'];
        $data_per_page = 2;
        $start = ($page-1) * $data_per_page;

        $total_rows = countRows($db);
        $result = $total_rows['filas'];
        $total_pages = ceil($result/$data_per_page);
        /*var_dump($start);

        var_dump($total_rows);
        var_dump($result);
        var_dump($total_pages);
        var_dump($page);
        //die();
        */
        $productos = getProductosLimit($db, $start,$data_per_page);

        //$productos = getProductos($db);
        if(!empty($productos)):
            foreach($productos as $producto):
                //var_dump($producto);
                //die();

                
    ?>

    <div id="producto">
        
        <h2>Producto: <?=$producto['Nombre']?> | <?=$producto['Precio']?>€</h2>
        <span><?=$producto['categoria']?></span>
        <div id="links">
            <a href="./crud/delete_producto.php?id=<?=$producto['idProducto']?>"  
            onclick="return confirm('¿Deseas eliminar?');">Eliminar </a>
            <a href="update_producto.php?update=<?=$producto['idProducto']?>"> Actualizar</a>
        </div>
    </div>
    <?php 
   
   
    endforeach;
        endif;?>

      
<ul class="pagination">
    <li><a href="?page=1">Primera</a></li>
    <li class="<?php if($page <= 1){ echo 'disabled'; } ?>">
        <a href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>">Anterior</a>
    </li>
    <li class="<?php if($page >= $total_pages){ echo 'disabled'; } ?>">
        <a href="<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=".($page + 1); } ?>">Siguiente</a>
    </li>
    <li><a href="?page=<?php echo $total_pages; ?>">Final</a></li>
</ul>
-->
</div>


<?php include_once 'includes/footer.php';?>