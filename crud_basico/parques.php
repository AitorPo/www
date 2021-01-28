<?php 
    require_once 'crud/functions.php';
    include_once 'includes/header.php';
    require_once 'crud/functions.php';
?>

<div id="main">
    <h1>Todos los parques</h1>
    <?php
        $parques = getParques($db);
        //var_dump($parques);
                //die();
        if(!empty($parques)):
            foreach($parques as $parque):
                //var_dump($parque);
    ?>

    <div id="parque">
        <h2>Parque: <?=$parque['nombre']?> | Ciudad: <?=$parque['ciudad']?></h2>
        <a href="./crud/delete_parque.php?nombre=<?=$parque['nombre']?>">Eliminar </a>
        <a href="update_parque.php?nombre=<?=$parque['nombre']?>"> Actualizar</a>
    </div>
            
    <?php endforeach;
        endif;?>
</div>
<?php include_once 'includes/footer.php';?>