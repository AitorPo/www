<?php 
include_once 'includes/header.php';
include_once 'includes/sidebar.php';
require_once 'includes/functions.php';
?>


<?php 
//se mostraran las entradas solo si existe sesion activa (alguien ha hecho login)
//de lo contrario la pagina aparecera en blanco
if(isset($_SESSION['user'])):
$user_id = $_SESSION['user']['u_id'];
//var_dump($user_id)
?>

<div id="main">
    <h1>Todas mis entradas</h1>
    <?php 
    
    $topics = getTopics($db,null, null, $user_id);
    if(!empty($topics)):
        foreach($topics as $topic):
            //var_dump($topic)
    ?>
    <?php if ($topic['u_id'] == $user_id || $_SESSION['user']['u_rol'] == DB_ADMIN || $_SESSION['user']['u_rol'] == TOPIC_ADMIN):?>
    <div id="topic">
    <br />
    <a href="topic.php?id=<?=$topic['to_id']?>">
    
        <h3><strong><?=$topic['to_title']?></strong></h3>
        </a>
        <span class="date"><?=$topic['to_date']?></span>
        <br /> 
        <?=$topic['to_content']?>
    </div>

<?php 
endif;
    endforeach;
endif;
endif;?>

</div>