<!-- Ver entradas de una categoria -->
<?php include_once 'includes/helpers.php';
    require_once 'includes/header.php';
    require_once 'includes/sidebar.php';
    require_once 'includes/header.php';?>
    <?php $categoria_actual = getCategoria($db, $_GET['id']);
               if(!isset($categoria_actual['id'])){
                   header('Location: index.php');
               }
               ?>
    <div id="principal"> 
            <h1>Todas entradas de <?= $categoria_actual['nombre']?></h1>
            <?php
                $entradas = getEntradas($db, null, $_GET['id']);
                if(!empty($entradas) && mysqli_num_rows($entradas) >= 1):
                    while($entrada = mysqli_fetch_assoc($entradas)):
            ?>            
            <article class="posts">
                <a href="entrada.php?id=<?=$entrada['id']?>">
                    <h2><?=$entrada['titulo']?></h2>
                    <span class="date"><?=$entrada['categoria'].' | '.$entrada['fecha']?></span>
                    <p>
                    <!-- Limitamos el nº de caracteres que se mostrarán en index.php antes de pinchar sobre cada entrada -->
                    <?=substr($entrada['descripcion'], 0, 200)?>
                    </p>
                </a>
            </article>
            <?php
                    endwhile;
                else:  
            ?>
            <div class="alerta alerta-error">No hay entradas en esta categoría</div>
            <?php endif; ?>
        </div><!--FIN DE PRINCIPAL-->
        <?php require_once 'includes/footer.php';?>