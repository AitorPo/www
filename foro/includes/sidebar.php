<!-- CARGA DE FUNCIONES -->
<?php require_once 'includes/helpers.php'?>
<!-- BARRA LATERAL / SIDEBAR -->
<aside id="sidebar">

    <?php if(isset($_SESSION['usuario'])): ?>
        <div id="usuario-logueado" class="block-aside">
            <h3>Bienvenido, <?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos']; ?></h3>
            <!-- <?php var_dump($_SESSION['usuario']); ?> -->

            <div class="left">
            <a href="crear_entrada.php" class="button button-green">Crear entrada</a> 
            <a href="crear_categoria.php" class="button button-blue">Crear categoría</a>
            </div>
            <div class="right">
            <a href="mis_datos.php" class="button button-orange">Mis datos</a> 
            <a href="logout.php" class="button button-red">Cerrar sesión</a> 
            </div>
        </div>
    <?php endif; ?>

    <!-- Comprobacion general para saber si existe sesion inciada o no. 
            ** 2 CASOS POSIBLES **
            
            1-* La sesion esta iniciada: no se mostrarán los paneles de login ni de signup
            2-* La sesión NO está iniciada: se mostrarán dichos paneles 
    -->
    <?php if(!isset($_SESSION['usuario'])): ?>

            <div id="login" class="block-aside">
                <h3>Identifícate</h3>

                <?php if(isset($_SESSION['error_login'])): ?>
                    <div class="alerta alerta-error">
                        <?=$_SESSION['error_login'];?>
                    </div>
                <?php endif; ?>

                <form action="login.php" method="POST">
                    <label for="email">Email</label>
                    <input type="email" name="email" />

                    <label for="password">Contraseña</label>
                    <input type="password" name="password" />

                    <input type="submit" value="Entrar" />
                </form>
                
            </div>
  
            <div id="signup" class="block-aside">
                <!-- DEBUG DE ERRORES
                    <?php if(isset($_SESSION['errores'])): ?>
                    <?php var_dump($_SESSION['errores']); ?>
                <?php endif; ?> 
                     FIN DEBUG ERRORES-->
                
                <h3>Regístrate</h3>

                <!-- MOSTRAR ERRORES -->
                <?php if(isset($_SESSION['completado'])) : ?>
                    <div class="alerta alerta-exito">
                       <?=$_SESSION['completado'] ?>
                    </div>
                <?php elseif(isset($_SESSION['errores']['general'])): ?>
                    <div class="alerta alerta-error">
                       <?=$_SESSION['errores']['general'] ?>
                    </div>
                <?php endif ?>
                <!-- FIN MOSTRAR ERRORES -->

                <form action="signup.php" method="POST">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" />
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>

                    <label for="apellidos">Apellidos</label>
                    <input type="text" name="apellidos" />
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>

                    <label for="email">Email</label>
                    <input type="email" name="email" />
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

                    <label for="password">Contraseña</label>
                    <input type="password" name="password" />
                    <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>

                    <input type="submit" name="submit" value="Registrar" />
                </form>
                <?php borrarErrores(); ?>
            </div>
        <!-- Fin condicion general de comprobacion de inicio de sesion -->
        <?php endif; ?>
        </aside>