<?php include_once 'includes/helpers.php';
    require_once 'includes/header.php';
    require_once 'includes/sidebar.php';
    require_once 'includes/header.php';?>
    

<div id="principal">
            <h1>Todas entradas</h1>

            <?php
                $entradas = getEntradas($db);
                if(!empty($entradas)):
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
                endif;    
            ?>

        </div><!--FIN DE PRINCIPAL-->
        <?php require_once 'includes/footer.php';?>