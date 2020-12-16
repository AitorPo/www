<?php include_once 'includes/functions.php';
    require_once 'includes/header.php';
    require_once 'includes/sidebar.php';
    ?>
<?php $current_topic = getTopic($db, $_GET['id']);

//si no existe la id redirecciona al index
    if(!isset($current_topic['to_id'])){
        header('Location: index.php');
    }
?>

<div id="main">
    <h1>Editar entrada</h1>
<p>
    Edita tu entrada <strong><?=$current_topic['to_title']?></strong>
</p>
<hr />

<form action="save_topic.php?edit=<?=$current_topic['to_id']?>" method="POST">
<label for="title">Título: </label>
<input type="text" name="title" value="<?=$current_topic['to_title']?>">
<!-- Mostramos errores -->
<?php  echo isset($_SESSION['input_errors']) ? showErrors($_SESSION['input_errors'], 'title') : '';?>

<label for="content">Contenido:  </label>
<textarea name="content" style="margin: 0px; width: 775px; height: 172px; resize: none"><?=$current_topic['to_content']?></textarea>
<?php echo isset($_SESSION['input_errors']) ? showErrors($_SESSION['input_errors'], 'content') : ''; ?>

<input type="submit" value="Actualizar" />
</form>
<?php deleteErrors();?>
</div>
<?php require_once 'includes/footer.php';?>