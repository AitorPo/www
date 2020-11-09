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

<?php if(isset($_SESSION['user']) && $_SESSION['user']['u_id'] == $current_topic['u_id']): ?>
                
                    <a href="edit_topic.php?id=<?=$current_topic['to_id']?>">Editar entrada</a> 
                
            <?php endif; ?>
</div>



<?php require_once 'includes/footer.php';?>