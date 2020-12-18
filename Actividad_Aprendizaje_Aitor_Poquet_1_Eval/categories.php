<?php 
require_once 'includes/functions.php';
include_once 'includes/header.php';
include_once 'includes/sidebar.php';
require_once 'includes/functions.php';

?>
<div id="main">

    <h1>Todas las categorías</h1>
    <?php 
        $categories = getCategories($db);
        if(!empty($categories)): 
            foreach($categories as $category):
                //var_dump($category);
    ?>
        <div id="category">
        <a href="category.php?id=<?=$category['cate_id']?>">
                
            <h2><?=$category['cate_name']?></h2>
        </a>
            <p>
                <?=$category['cate_desc']?>
            </p>
            <br/>
            <?php if(isset($_SESSION['user'])):?>
            <?php if($_SESSION['user']['u_rol'] == DB_ADMIN):?>
            <a href="delete_category.php?id=<?=$category['cate_id']?>" class="topic delete">Eliminar categoría</a>
            <?php 
            endif;
        endif; ?>

        </div>
        <?php      
            endforeach;
     endif;?>
</div>

<?php include_once 'includes/footer.php';

?>