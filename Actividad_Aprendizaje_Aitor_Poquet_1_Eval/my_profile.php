<?php 
include_once 'includes/header.php';
include_once 'includes/sidebar.php';
require_once 'includes/functions.php';

?>

<div id="main">
    <h1>Mis datos</h1>
    <?php if(isset($_SESSION['completed'])): ?>
        <div class="alert alert_succes">
            <?= $_SESSION['completed']?>
        </div>
        <?php elseif(isset($_SESSION['errors']['global'])): ?>
		<div class="alert alert-error">
			<?=$_SESSION['errors']['global']?>
		</div>
    <?php endif; ?>    
    <form action="update_user.php" method="POST">

    <label for="name">Nombre de usuario actual</label>
    <input type="text" name="name" value="<?= $_SESSION['user']['u_name'];?>" disabled/>
    <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'name') : '';?>

    <label for="new_name">Nombre de usuario nuevo</label>
    <input type="text" name="new_name" />
    <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'new_name') : '';?>

    <label for="email">Email actual</label>
    <input type="email" name="email" value="<?= $_SESSION['user']['u_email'];?>" disabled/>
    <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'email') : ''; ?>

    <label for="new_email">Email nuevo</label>
    <input type="email" name="new_email"/>
    <?php echo isset($_SESSION['errors']) ? showErrors($_SESSION['errors'], 'new_email') : ''; ?>

    <input type="submit" name="submit" value="Actualizar" />
    </form>
    <!-- borramos las alertas al recargar -->
    <?php deleteErrors();?>
</div>

<?php include_once 'includes/footer.php'?>
