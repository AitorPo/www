<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validar formularios en PHP</title>
</head>
<body>
    <h1>Validar formularios en PHP</h1>

    <?php
        if (isset($_GET['error'])) {
            $error = $_GET['error'];

            if ($error == 'faltan_valores') {
                echo '<strong style="color:red">Introduce todos los datos del formulario</strong>';
            }

            if ($error == 'nombre') {
                echo '<strong style="color:red">El nombre no es correcto</strong>';
            } 
            if ($error == 'apellidos') {
                echo '<strong style="color:red">Los apellidos no son correctos</strong>';
            } 
            if ($error == 'edad') {
                echo '<strong style="color:red">La edad no es correcta</strong>';
            } 
            if ($error == 'email') {
                echo '<strong style="color:red">El email no es valido</strong>';
            } 
            if ($error == 'password') {
                echo '<strong style="color:red">La contraseña tiene menos de 5 caracteres</strong>';
            }
        }
    ?>

    <form method="POST" action="procesar_formulario.php" >
        <label for="nombre">Nombre</label><br/>
        <input type="text" name="nombre" pattern="[A-Za-Z]+" required="required"/><br/>

        <label for="apellidos">Apellidos</label><br/>
        <input type="text" name="apellidos" pattern="[A-Za-Z]+" required="required"/><br/>

        <label for="edad">Edad</label><br/>
        <input type="number" name="edad" pattern="[0-9]+" required="required"/><br/>

        <label for="email">Email</label><br/>
        <input type="email" name="email" required="required"/><br/>

        <label for="password">Contraseña</label><br/>
        <input type="password" name="password" required="required"/><br/>

        <input type="submit" value="Enviar" /><br/>
    </form>
</body>
</html>