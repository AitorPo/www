<?php
#mode = permisos de linux sobre archivos r = read, x = execute, w = write

//abrir archivo
$archivo = fopen('fichero_texto.txt', 'a+');
//leer contenido
while(!feof($archivo)){
$contenido = fgets($archivo);
echo $contenido."<br/>";
}
//escribir
//fwrite($archivo, ' Texto metido desde PHP. Se necesitan permisos a+ para poder acceder, leer y escribir');
//cerrar archivo
fclose($archivo);

//copiar fichero
copy('fichero_texto.txt', 'fichero_copiado.txt') or die("Error al copiar");

//renombrar
rename('fichero_copiado.txt', 'fichero_renombrado.txt');

//Eliminar
//unlink('fichero_renombrado.txt') or die('Error al borrar');

//comprobar si existe o no el fichero
if (file_exists('fichero_texto.txt')) {
    echo 'El archivo existe';
}else{
    echo 'El archivo NO existe';
}
?>