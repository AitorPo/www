<?php
//variables de servidor
echo "<h1>";
//direccion IP del servidor
echo $_SERVER['SERVER_ADDR'];
echo "</h1>";

echo "<h1>";
//nombre del servidor
echo $_SERVER['SERVER_NAME'];
echo "</h1>";

echo "<h1>";
//software del servidor
echo $_SERVER['SERVER_SOFTWARE'];
echo "</h1>";

echo "<h1>";
//navegador web desde el que se accede al servidor
echo $_SERVER['HTTP_USER_AGENT'];
echo "</h1>";

echo "<h1>";
//direccion IP del usuario
echo $_SERVER['REMOTE_ADDR'];
echo "</h1>";
?>