<?php include_once 'includes/functions.php';
    require_once 'includes/header.php';
    require_once 'includes/sidebar.php';
    require_once 'includes/header.php';?>
<?php $current_topic = getTopic($db, $_GET['id']);

    ?>

<div id="main">
<h1><?=$current_topic['to_title']?></h1>
<h4><?=$current_topic['to_date']?> | <?=$current_topic['u_name']?></h4>
<p>
    <?=$current_topic['to_content']?>
</p>

<br />
<h3>Comentarios</h3>

            <?php 
            $topic_id = $_GET['id'];
            $comments = getComments($db, $topic_id);
foreach($comments as $comment):?>
    <div class="comment create_comment">
<p>
    <?=$comment['co_content']?>

</p>
    </div>
<?php endforeach; ?>
<?php if(isset($_SESSION['user']) && $_SESSION['user']['u_id'] != $current_topic['u_id'] ||
(isset($_SESSION['user']) && $_SESSION['user']['u_id'] == $current_topic['u_id'])): ?>

<form action="save_comment.php?id=<?=$current_topic['to_id']?>" method="POST">
<br />
<label for="content">¿Qué se te pasa por la cabeza?</label>
<input type="text" name="content" placeholder="Escribe quí tu comentario...">

<input class="btn_send"type="submit" value="Enviar" />
</form>
<?php endif; ?>    
    </div>
</div>

<?php require_once 'includes/footer.php';?>
