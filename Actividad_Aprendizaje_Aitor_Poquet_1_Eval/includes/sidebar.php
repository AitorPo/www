<!-- Carga de funciones -->
<?php require_once 'includes/functions.php' ;?>
<!-- BARRA LATERAL / SIDEBAR -->
<aside id="sidebar">
    <div id="login" class="block-aside">
        <h3>Identifícate</h3>

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
</aside>