<?php require_once 'includes/redirect.php'?>
<?php require_once 'includes/header.php'?>
<?php require_once 'includes/sidebar.php'?>
<?php require_once 'crear_entrada.php'?>

<!-- PRINCIPAl -->
<div id="principal">
    <h1>Crear entradas</h1>
    <p>
        Añade nuevas entradas para que los usuarios puedan leerlas y disfrutar de nuestro contenido
    </p>
    <br />
    <form action="guardar_entrada.php" method="POST">
        <label for="titulo">Título:  </label>
        <input type="text" name="titulo" />
        <!-- Mostramos los errores -->
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>


        <label for="descripcion">Descripción:  </label>
        <textarea class="ta" name="descripcion" style="margin: 0px; width: 775px; height: 172px; resize: none;"></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

        <label for="categoria">Categoría</label>
        <select name="categoria">
            <?php $categorias = getCategorias($db);
            if(!empty($categorias)):
                while($categoria = mysqli_fetch_assoc($categorias)):
            ?>
                <option value="<?=$categoria['id']?>">
                    <?=$categoria['nombre']?>
                </option>
            <?php 
                endwhile; 
            endif;      
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>

        <input type="submit" value="Crear" />

    </form>
    <?php borrarErrores(); ?>
</div>

<?php require_once 'includes/footer.php'?>