<?php require_once 'errors.php' ;?>

<aside id="sidebar">
<!-- <?php var_dump($_SESSION['operario']); ?> -->

<?php if(isset($_SESSION['operario'])):?>
    <div id="loged_user">
        <h3>¡Hola <strong><?=$_SESSION['operario']['nombre'];?></strong>!</h3>
        <div class="user_options">
            <a href="logout.php" class="button button_red">Cerrar sesión</a>
        </div>  
    </div>
<?php endif;?>
    <div id="login">
        <h3>Identifícate</h3>
            <?php if(isset($_SESSION['error_login'])): ?>
                        <div class="alert alert-error">
                            <?=$_SESSION['error_login'];?>
                        </div>
                    <?php endif; ?>

            <form action="login.php" method="POST">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" />

                <label for="password">Contraseña</label>
                <input type="password" name="password" />

                <input type="submit" value="Enviar" />
            </form>
    </div>
    <?php deleteErrors(); ?>
</aside>

