<!--Primero que todo tenemos que procesar los campos que llegan
antes de meter los datos en la pagina HTML-->
<?php
$error = 'faltan_valores';
if (!empty($_POST['nombre']) && !empty($_POST['apellidos']) && !empty($_POST['edad']) 
&& !empty($_POST['email']) && !empty($_POST['password'])) {
    $error = 'ok';
    
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = (int)$_POST['edad'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    //validamos variables de datos
    if (!is_string($nombre) || preg_match("/[0-9]/", $nombre)) {
        $error = 'nombre';
    }
    if (!is_string($apellidos) || preg_match("/[0-9]/", $apellidos)) {
        $error = 'apellidos';
    }
    if (!is_int($edad) || !filter_var($edad, FILTER_VALIDATE_INT)) {
        $error = 'edad';
    }
    if (!is_string($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'email';
    }
    if (empty($password) || strlen($password) < 5) {
        $error = 'password';
    }
    
}else{
    $error = 'faltan_valores';
    //redireccion a index y mostramos el valor del error por URL
   
}
if ($error != 'ok') {
    header("Location:index.php?error=$error");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validacion de formularios en PHP</title>
</head>
<body>
    <?php if ($error == 'ok') : ?>
        <h1>Datos validad correctamente</h1>
        <p><?=$nombre?></p>
        <p><?=$apellidos?></p>
        <p><?=$edad?></p>
        <p><?=$email?></p>
    <?php endif; ?>    
    
</body>
</html>