<!--Este fichero está en la carpeta global y no se llama index.php para ver que se carga y funciona correctamente
aunque esté organizado de dicha manera-->
<?php 

define('nombre', 'Aitor');
define('apellidos', 'Poquet Ginestar');

echo "<h1>".nombre."</h1>";
echo "<h1>".apellidos."</h1>";

//constantes predefinidas
echo PHP_OS."<br/>";
echo PHP_VERSION."<br/>";
echo PHP_EXTENSION_DIR."<br/>";
echo __LINE__."<br/>";
echo __DIR__."<br/>";
echo __CLASS__."<br/>";

?>