<!-- Carga de funciones -->
<?php require_once 'includes/functions.php' ;?>
<!-- BARRA LATERAL / SIDEBAR -->
<aside id="sidebar">
<?php var_dump($_SESSION); ?>

<?php if(isset($_SESSION['user'])): ?>
    <?php var_dump($_SESSION['user']); ?>
        <div id="loged_user" class="block-aside">
            <h3>¡Hola <strong><?=$_SESSION['user']['u_name'];?></strong>!</h3>
            <!-- <?php var_dump($_SESSION['user']); ?> -->

            <div class="user_options">
                <!-- if para que los admin no puedan modificar sus datos desde la web -->
                <?php if($_SESSION['user']['u_rol'] == USER):?>
                <a href="my_profile.php" class="button button_green">Mis datos</a>
                <a href="my_topics.php" class="button button_blue">Mis entradas</a>
                <?php elseif($_SESSION['user']['u_rol'] == DB_ADMIN || $_SESSION['user']['u_rol'] == TOPIC_ADMIN): ?>
                <a href="my_topics.php" class="button button_blue">Todas las entradas</a>
                <?php endif;?>
                <a href="logout.php" class="button button_red">Cerrar sesión</a>
                
            </div>        
        </div>
<?php endif; ?>

<?php if(!isset($_SESSION['user'])): ?>
    <div id="login" class="block-aside">
        <h3>Identifícate</h3>
        <?php if(isset($_SESSION['error_login'])): ?>
                    <div class="alert alert-error">
                        <?=$_SESSION['error_login'];?>
                    </div>
                <?php endif; ?>

        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email" />

            <label for="password">Contraseña</label>
            <input type="password" name="password" />

            <input type="submit" value="Enviar" />
        </form>
    </div>

    <div id="signup" class="block-aside">
        <!-- DEBUG DE ERRORES
        <?php if(isset($_SESSION['errors'])): ?>
                    <?php var_dump($_SESSION['errors']); ?>
        <?php endif; ?> 
        FIN DEBUG ERRORES-->
        <h3>Regístrate</h3>

        <!-- MOSTRAR ERRORES -->
        <?php if(isset($_SESSION['completed'])) : ?>
            <div class="alert alert-success">
                <?=$_SESSION['completed'] ?>
            </div>
        <?php elseif(isset($_SESSION['errors']['global'])): ?>
            <div class="alert alert-error">
                <?=$_SESSION['errors']['global'] ?>
            </div>
        <?php endif ?>
        <!-- FIN MOSTRAR ERRORES -->

        <form action="signup.php" method="POST">

            <label for="name">Nombre</label>
            <input type="text" name="name" />
            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'name') : ''; ?>
            <label for="email">Email</label>
            <input type="email" name="email" />
            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'email') : ''; ?>

            <label for="password">Contraseña</label>
            <input type="password" name="password" />
            <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'password') : ''; ?>

            <input type="submit" value="Enviar" />
        </form>
        <!-- Eliminamos los mensajes de error al recargar la página o reenviar el form -->
        <?php deleteErrors(); ?>
    </div>
        <?php endif; ?>
</aside>