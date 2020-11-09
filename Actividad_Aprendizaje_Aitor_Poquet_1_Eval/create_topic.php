<?php 
include_once 'includes/header.php';
include_once 'includes/sidebar.php';
require_once 'includes/functions.php';

?>
<?php 
$current_category = getCategory($db, $_GET['id']);

?>
<!-- MAIN -->
<div id="main">
    <h1>Crear tema</h1>
    <p>
        Crea tu nueva entrada
    </p>
    <br />

    <form action="save_topic.php?id=<?=$current_category['cate_id']?>" method="POST">
        <label for="title">Título</label>
        <input type="text" name="title" placeholder="Título de la entrada..."/>
        <?php echo isset($_SESSION['input_errors']) ? showErrors($_SESSION['input_errors'], 'title') : ''; ?>


        <label for="content">Contenido</label>
        <textarea name="content" placeholder="Contenido de la entrada..." style="margin: 0px; width: 775px; height: 172px; resize: none"></textarea>
        <?php echo isset($_SESSION['input_errors']) ? showErrors($_SESSION['input_errors'], 'content') : ''; ?>

        
        <input type="submit" value="Crear" />

    </form>
    <?php deleteErrors(); ?>
</div>
<?php include_once 'includes/footer.php' ?>