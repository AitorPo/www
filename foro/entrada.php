<!-- Ver contenido entero de una entrada -->
<?php include_once 'includes/helpers.php';
    require_once 'includes/header.php';
    require_once 'includes/sidebar.php';
    require_once 'includes/header.php';?>
    <?php $entrada_actual = getEntrada($db, $_GET['id']);
               if(!isset($entrada_actual['id'])){
                   header('Location: index.php');
               }
               ?>
    <div id="principal"> 
            <h1><?= $entrada_actual['titulo']?></h1>
            <a href="categoria.php?id=<?=$entrada_actual['categoria_id']?>">
            <h2><?=$entrada_actual['categoria']?></h2>
            </a>
           
            <h4><?=$entrada_actual['fecha']?> | <?=$entrada_actual['usuario']?></h4>
            <p>
                <?=$entrada_actual['descripcion']?>           
            </p>

            <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entrada_actual['usuario_id']): ?>
                <div class="left">
                    <a href="editar-entrada.php?id=<?=$entrada_actual['id']?>" class="button button-orange">Editar entrada</a> 
                    <a href="borrar-entrada.php?id=<?=$entrada_actual['id']?>" class="button button-red">Borrar entrada</a> 
                </div>
            <?php endif; ?>
            </div><!--FIN DE PRINCIPAL-->
        <?php require_once 'includes/footer.php';?>