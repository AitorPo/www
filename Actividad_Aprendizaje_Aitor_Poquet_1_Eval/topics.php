<?php 
require_once 'includes/functions.php';
include_once 'includes/header.php';
include_once 'includes/sidebar.php';
require_once 'includes/functions.php';?>

<?php $current_category = getCategory($db, $_GET['id']);
               if(!isset($current_category['id'])){
                   header('Location: index.php');
               }
               ?>

<div id="main">

    <h1>Todas las entradas de <?=$current_category['cate_name']?></h1>
    <?php 
        $topics = getTopics($db, null, $_GET['cate_id']);
        if(!empty($topics) && mysqli_num_rows($topics) >= 1): 
            foreach($topics as $topic):
    ?>
        <div id="topic">
        <a href="category.php">
            <h2><?=$category['cate_name']?></h2>
        </a>
            <p>
                <?=$category['cate_desc']?>
            </p>
        </div>
        <?php      
            endforeach;
     endif;?>
</div>

<?php include_once 'includes/footer.php';

?>