<?php
#se cierra la sesion que se ha abierto en index.php. Desde index.php podemos pasar a pagina1.php
#y la sesion se mantiene abierta con los datos guardados. Pero si de index.php o pagina1.php
#pasamos a logout.php se cierra la sesion y tenemos que volver a index.php para abrirla de nuevo
#si vamos de logout.php a pagina1.php no se encontraran datos ya que la sesion se habra cerrado.
#OK --> index.php --> pagina1.php -->logout.php --> index.php
#KO --> index.php --> pagina1.php --> logout.php --> pagina1.php
//inicio sesion
session_start();
//cierro/destruyo sesion
session_destroy();
?>