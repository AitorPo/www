<?php
//$_FILES['name_del_archivo_del_form']
$archivo = $_FILES['file'];
var_dump($archivo);

$nombre = $archivo['name'];
$tipo = $archivo['type'];

if ($tipo == 'image/jpg' || $tipo == 'image/jpeg' || $tipo == 'image/png' || $tipo == 'image/gif') {
    if (!is_dir('images')) {
        mkdir('images', 0777);
    }

    move_uploaded_file($archivo['tmp_name'], 'images/'.$nombre);
    header('Refresh: 5; URL=index.php');
    echo '<h3>imagen subida correctamente</h3>';
}else{
    header('Refresh: 5; URL=index.php');
    echo '<h1>Escoge un formato correcto para la imangen...</h1>';
}



?>