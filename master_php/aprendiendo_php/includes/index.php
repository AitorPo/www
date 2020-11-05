<!--
Entre include/include_once y require/require_once es mucho mejor y más estricto y fiable 
utilizar la rama require. Ambos hacen lo mismo pero require es siempre un poco mejor por lo ya comentado
-->
<?php
#hace que solo se inlcuya el ficheor UNA SOLA VEZ independientemente de las veces que hagas include del mismo
include_once '../includes/cabecera.php';
?>
<?php
include '../includes/cabecera.php';
?>

    <!--Contenido-->
    <div>
        <h2>Esta es la página de inicio</h2>
        <p>Texto de prueba de la página de inicio</p>
    </div>
    <?php
        var_dump($nombre);
    ?>

<?php
require '../includes/include/footer.php';
?>
<?php
#hace que solo se inlcuya el ficheor UNA SOLA VEZ independientemente de las veces que hagas require del mismo
require_once '../includes/include/footer.php';
?>
