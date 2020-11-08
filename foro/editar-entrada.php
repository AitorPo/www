<!-- Ver contenido entero de una entrada -->
<?php include_once 'includes/helpers.php';
    require_once 'includes/header.php';
    require_once 'includes/redirect.php';
   ?>
    <?php $entrada_actual = getEntrada($db, $_GET['id']);
               if(!isset($entrada_actual['id'])){
                   header('Location: index.php');
               }
               ?>
    <div id="principal">
    <h1>Editar entrada</h1>
    <p>
        Edita tu entrada <?=$entrada_actual['titulo']?>
    </p>
    <br />
    <form action="guardar_entrada.php?editar=<?=$entrada_actual['id']?>" method="POST">
        <label for="titulo">Título:  </label>
        <input type="text" name="titulo" value="<?=$entrada_actual['titulo']?>">
        <!-- Mostramos los errores -->
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo') : ''; ?>


        <label for="descripcion">Descripción:  </label>
        <textarea class="ta" name="descripcion" style="margin: 0px; width: 775px; height: 172px; resize: none"><?=$entrada_actual['descripcion']?></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion') : ''; ?>

        <label for="categoria">Categoría</label>
        <select name="categoria">
            <?php $categorias = getCategorias($db);
            if(!empty($categorias)):
                while($categoria = mysqli_fetch_assoc($categorias)):
            ?>
                <option value="<?=$categoria['id']?>"
                <?=($categoria['id'] == $entrada_actual['categoria_id']) ? 'selected="selected"': ''?>>
                    <?=$categoria['nombre']?>
                </option>
            <?php 
                endwhile; 
            endif;      
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria') : ''; ?>

        <input type="submit" value="Actualizar" />

    </form>
    <?php borrarErrores(); ?>
</div>
        <?php require_once 'includes/footer.php';?>