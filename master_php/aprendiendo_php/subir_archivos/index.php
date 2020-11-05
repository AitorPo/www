<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir archivos al servidor en PHP</title>
</head>
<body>
    <h1>Subir archivos en PHP</h1>
    <!--enctype es lo mas importante a la hora de subir archivos-->
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" />
        <input type="submit" value="Enviar" />
    </form>

    <h1>Listado de imagenes</h1>
    <?php
        $gestor = opendir('./images');
    //con estructuras de control  en PHP es recomendable usar los : y endXXX para ue se vea todo mas claro 
        if ($gestor) :
            while(($image = readdir($gestor)) !== false) :
            //. = dir actual // .. = dir anterior. Si no lo eliminamos lo muestra en la web
                if ($image != '.' && $image != '..') :
                    echo "<img src='images/$image' width='200px'/><br />";
                endif;
            endwhile;
        endif;
    ?>
</body>
</html>