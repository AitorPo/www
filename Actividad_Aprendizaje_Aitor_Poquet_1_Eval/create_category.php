<?php 
include_once 'includes/header.php';
include_once 'includes/sidebar.php';
require_once 'includes/functions.php';
?>

<!-- MAIN -->
<div id="main">
    <h1>Crear categoría</h1>
    <form action="save_category.php" method="POST">

    <label for="category_name">Nombre de la categoría</label>
    <input type="text" name="category_name" />
    <?php echo isset($_SESSION['input_errors']) ? showErrors($_SESSION['input_errors'], 'category_name') : ''; ?>

    <label for="category_desc">Descripción de la categoría</label>
    <textarea name="category_desc" style="margin: 0px; width: 775px; height: 172px; resize: none;" ></textarea>
    <?php echo isset($_SESSION['input_errors']) ? showErrors($_SESSION['input_errors'], 'category_desc') : ''; ?>

    <input type="submit" name="submit" value="Crear" />
    </form>
    <?php deleteErrors();?>
</div>



<?php include_once 'includes/footer.php';

