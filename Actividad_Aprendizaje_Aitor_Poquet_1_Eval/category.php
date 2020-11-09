<?php 
require_once 'includes/functions.php';
include_once 'includes/header.php';
include_once 'includes/sidebar.php';
require_once 'includes/functions.php';

?>
<?php 
$current_category = getCategory($db, $_GET['id']);

?>
<div id="main">

    <h1>Todas las entradas de <?=$current_category['cate_name']?></h1>
    <?php 
        $topics = getTopics($db, $_GET['id']);
        if(!empty($topics)): 
            foreach($topics as $topic):
    ?>
        <div id="topic">
        <a href="topic.php?id=<?=$topic['to_id']?>">
            <h2><?=$topic['to_title']?></h2>
            <span class="date"><?=$topic['to_date']?> | <?=$topic['u_name']?></span>
        </a>
            <p>
                <?=substr($topic['to_content'],0,200)?>
            </p>
        </div>
        <?php      
            endforeach;
        else:?>

<div class="alert alert-error">NO hay entradas</div>
     <?php endif;?>
    
                <?php if(isset($_SESSION['user'])): ?>
                    <a href="create_topic.php?id=<?=$current_category['cate_id']?>">Crear entrada</a> 
                <?php endif;?>
            
</div><!--FIN DE PRINCIPAL-->
        <?php require_once 'includes/footer.php';?>

