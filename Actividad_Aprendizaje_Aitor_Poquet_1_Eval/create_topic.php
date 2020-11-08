<?php 
include_once 'includes/header.php';
include_once 'includes/sidebar.php';
?>
<!-- MAIN -->
<div id="main">
    <h1>Crear tema</h1>
    <p>
        Crea un nuevo tema para debatir con la comunidad
    </p>
    <br />

    <form action="save_topic.php" method="POST">
        <label for="title">Título</label>
        <input type="text" name="title" />

        <label for="content">Contenido</label>
        <textarea name="content" style="margin: 0px; width: 775px; height: 172px; resize: none;"></textarea>

        <label for="category">Categoría</label>
            <select name="category">
                <option>Value1</option>
                <option>Value2</option>
                <option>Value3</option>
            </select>
        <input type="submit" value="Crear" />

    </form>
</div>
<?php include_once 'includes/footer.php' ?>