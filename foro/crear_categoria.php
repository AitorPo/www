<?php require_once 'includes/redirect.php'?>
<?php require_once 'includes/header.php'?>
<?php require_once 'includes/sidebar.php'?>
<?php require_once 'crear_categoria.php'?>

<!-- PRINCIPAl -->
<div id="principal">
    <h1>Crear categorías</h1>
    <p>
        Añade nuevas categorías para que los usuarios puedan usarlas al crear sus entradas
    </p>
    <br />
    <form action="guardar_categoria.php" method="POST">
        <label for="nombre">Nombre de la categoría: </label>
        <input type="text" name="nombre" />

        <input type="submit" value="Crear" />

    </form>
</div>

<?php require_once 'includes/footer.php'?>