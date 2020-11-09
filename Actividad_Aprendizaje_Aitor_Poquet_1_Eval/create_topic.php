<?php 
include_once 'includes/header.php';
include_once 'includes/sidebar.php';
require_once 'includes/functions.php';

?>
<?php 
if(isset($_GET['id'])){
$current_category = getCategory($db, $_GET['id']);
}else{
    $current_category = getCategory($db);

}
?>
<!-- MAIN -->
<div id="main">
    <h1>Crear tema</h1>
    <p>
        Crea tu nueva entrada
    </p>
    <br />
    <?php if(isset($_GET['id'])): ?>
    <form action="save_topic.php?id=<?=$current_category['cate_id']?>" method="POST">
    <?php else: ?>
    <form action="save_topic.php" method="POST">

    <?php endif; ?>   
    
    <label for="title">Título</label>
        <input type="text" name="title" placeholder="Título de la entrada..."/>
        <?php echo isset($_SESSION['input_errors']) ? showErrors($_SESSION['input_errors'], 'title') : ''; ?>


        <label for="content">Contenido</label>
        <textarea name="content" placeholder="Contenido de la entrada..." style="margin: 0px; width: 775px; height: 172px; resize: none"></textarea>
        <?php echo isset($_SESSION['input_errors']) ? showErrors($_SESSION['input_errors'], 'content') : ''; ?>

        <!-- Si no se accede a crear tema desde una categoría concreta
            sino desde el botón del menu de "Crear tema"
        definimos un select para seleccionar la categoría, de todas las existentes, a la que se quiere destinar el tema
        -->
        <?php if(!isset($_GET['id'])):?>
            <label for="category">Categoría</label>
            <select name="category">
                <!-- Obtenemos la lista de categoriías -->
                <?php $categories = getCategories($db);
                    foreach($categories as $category):
                ?>
                <!-- Listamos cada categoría en un option del select -->
                <option>
                <?=$category['cate_name']?>
                </option>
                <?php endforeach; ?>
               </select>
                    
    <?php endif; ?>
        
        <input type="submit" value="Crear" />

    </form>
    <?php deleteErrors(); ?>
</div>
<?php include_once 'includes/footer.php' ?>