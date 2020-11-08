<?php 
require_once 'includes/functions.php';
include_once 'includes/header.php';
include_once 'includes/sidebar.php';
require_once 'includes/functions.php';

?>
<div id="main">

    <h1>Todas las categorías</h1>
    <?php 
        $categories = getCategory($db);
        if(!empty($categories)): 
            foreach($categories as $category):
    ?>
        <div id="category">
            <h2><?=$category['cate_name']?></h2>
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