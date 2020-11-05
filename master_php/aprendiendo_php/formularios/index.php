<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formularios PHP y HTML</title>
    </head>
    <body>
        <h1>Formulario</h1>
        
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="nombre">Nombre</label>
            <p><input type="text" name="nombre"/></p>

            <label for="apellido">Apellido</label>
            <!--[A-Z ]+  significa: letras mayus de A-Z, con espacios un nº indefinido de veces(+)-->
            <p><input type="text" name="apellido" pattern="[A-Z ]+" minlength="5" required="required"
            placeholder="Apellido..."/></p>
            <input type="submit" value="Enviar" />

        </form>
    </body>
</html>