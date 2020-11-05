<div id="principal">
            <h1>Últimas entradas</h1>

            <?php
                $entradas = getUltimasEntradas($db);
                if(!empty($entradas)):
                    while($entrada = mysqli_fetch_assoc($entradas)):
            ?>            
            <article class="posts">
                <a href="">
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

            <div id="ver_todas">
                <a href="">Ver todas las entradas</a>
            </div>
        </div><!--FIN DE PRINCIPAL-->