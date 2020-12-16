<?php include_once 'includes/functions.php';
    require_once 'includes/header.php';
    require_once 'includes/sidebar.php';
 ?>
<?php $current_topic = getTopic($db, $_GET['id']);
//var_dump($current_topic);
//var_dump($_SESSION['user']);
?>

<div id="main">
<h1><?=$current_topic['to_title']?></h1>
<h4><?=$current_topic['to_date']?> | <?=$current_topic['u_name']?></h4>
<p>
    <?=$current_topic['to_content']?>
</p>

<?php if(isset($_SESSION['user'])): 
     //var_dump($current_topic['u_id'], $_SESSION['user']['u_id'])
     ?>
            <?php if ($_SESSION['user']['u_id'] == $current_topic['u_id']):?>
                <a href="edit_topic.php?id=<?=$current_topic['to_id']?>">Editar entrada</a> 
                    <br />
                    <a href="create_comment.php?id=<?=$current_topic['to_id']?>">Añadir comentario</a>
                    <br />
                    <a href="delete_topic.php?id=<?=$current_topic['to_id']?>">Eliminar entrada</a> 
                    

           <?php elseif ($_SESSION['user']['u_rol'] == TOPIC_ADMIN || ($_SESSION['user']['u_rol'] == DB_ADMIN)):
                //var_dump($_SESSION['user'])
                ?>  
                <a href="edit_topic.php?id=<?=$current_topic['to_id']?>">Editar entrada</a> 
                    <br />
                    <a href="create_comment.php?id=<?=$current_topic['to_id']?>">Añadir comentario</a>
                    <br />
                   
            <?php endif; ?>
                    

            <?php elseif(isset($_SESSION['user']) && $_SESSION['user']['u_id'] != $current_topic['u_id']): 
                 //var_dump($current_topic['u_id'], $_SESSION['user']['u_id'])
                 ?>
            <!-- link a crear comentario justo debajo del tema para evitar al maximo hacer scroll -->
    <a href="create_comment.php?id=<?=$current_topic['to_id']?>">Añadir comentario</a>
            <?php endif; ?>     
            <!-- php if para que elimine el error de no encontrar definido el index user para usuarios no logueados -->
            <?php if(isset($_SESSION['user'])): ?>
<?php if($_SESSION['user']['u_rol'] == TOPIC_ADMIN  && $_SESSION['user']['u_id'] != $current_topic['u_id']
        || $_SESSION['user']['u_rol'] == DB_ADMIN  && $_SESSION['user']['u_id'] != $current_topic['u_id']): 
    //var_dump($current_topic['u_id'], $_SESSION['user']['u_id'])
    ?> 
    
        <a href="delete_topic.php?id=<?=$current_topic['to_id']?>">Eliminar entrada</a>
<?php endif;
endif;?>

<h3>Comentarios</h3>
            <?php 
            $topic_id = $_GET['id'];
            $comments = getComments($db, $topic_id);
            
foreach($comments as $comment):?>
    <div class="comment">
   <h5><?=$comment['u_name'];
   //var_dump($comment)?>
   <?php if($_SESSION['user']['u_id'] == $comment['u_id'] || $_SESSION['user']['u_rol'] == TOPIC_ADMIN):
    //var_dump($_SESSION['user'])
    ?>
                    <a href="delete_comment.php?id=<?=$current_topic['to_id']?>">Eliminar comentario</a> </h5>
   <?php endif; ?>
                    <p>
    <?=$comment['co_content']?>

</p>

<?php endforeach; ?>
            <!-- link a crear comentario justo despues del ultimo comentario para evitar al maximo hacer scroll -->
<?php if(isset($_SESSION['user']) && $_SESSION['user']['u_id'] != $current_topic['u_id']) :?>
    <a href="create_comment.php?id=<?=$current_topic['to_id']?>">Añadir comentario</a>
<?php elseif(isset($_SESSION['user']) && $_SESSION['user']['u_id'] == $current_topic['u_id']): ?>
    <a href="create_comment.php?id=<?=$current_topic['to_id']?>">Añadir comentario</a>
<?php else :?>
<?php endif; ?>  
    </div>
</div>

